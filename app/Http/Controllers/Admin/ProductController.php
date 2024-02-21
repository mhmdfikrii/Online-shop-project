<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\UpdateProductRequest;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        $product = Product::all();
        // dd($product);
        return view('admin.product.index', [
            'title' => 'Produk Penjualan',
            'product' => $product
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create', [
            'title' => 'Tambah Produk',
            'category' => CategoryProduct::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'slug' => 'required|max:255|unique:products',
                'id_category' => 'required|exists:category_products,id',
                'body' => 'required',
                'harga' => 'required',
                'stock' => 'required',
                'image1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image4' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image5' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Kode Unik Kode Produk Kombinasi (IdKategori+tanggal Create)
            $id_category = $validatedData['id_category'];
            $currentTime = Carbon::now();
            $kodeProduk = $id_category . $currentTime->format('ymdHis');
            $validatedData['KodeProduct'] = $kodeProduk;

            // Gabungan Slug dan Kode Produk Menghindari kesamaan nama Slug sekaligus jadi Link produk
            $validatedData['slug'] .= '-' . $kodeProduk;
            $validatedData['harga'] = str_replace('.', '', $validatedData['harga']);
            $validatedData['user_id'] = auth()->user()->id;

            // Create folder for product images based on product slug
            $folderPath = 'Product-images/' . $validatedData['KodeProduct'];
            if (!Storage::exists($folderPath)) {
                Storage::makeDirectory($folderPath, 0777, true);
            }

            // Process and store images
            $images = [];
            foreach (range(1, 5) as $index) {
                $imageFieldName = 'image' . $index;
                if ($request->hasFile($imageFieldName)) {
                    $image = $request->file($imageFieldName);
                    if ($image->isValid()) {
                        $imageName = $image->getClientOriginalName();
                        $imagePath = $image->storeAs($folderPath, $imageName);
                        // Simpan path gambar ke dalam array
                        $images[$imageFieldName] = $imagePath;
                    } else {
                        // Handle invalid file
                        return redirect()->back()->with(['fail' => 'File yang diunggah tidak valid']);
                    }
                }
            }

            // Set image paths to corresponding fields in validatedData
            foreach ($images as $key => $value) {
                $validatedData[$key] = $value;
            }

            // Create Product with validated data
            Product::create($validatedData);

            return redirect('/product_admin')->with('success', 'Produk berhasil ditambahkan');
        } catch (ValidationException $e) {
            $errors = $e->validator->errors();
            return redirect()->back()->withErrors($errors)->with(['fail' => 'Periksa Kembali Data Anda']);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, $slug)
    {
        $product = Product::where('slug', $slug)->first();
        Product::where('slug', $slug)->first();

        return view('admin.product.edit', [
            'title' => 'Edit Produk',
            'categories' => CategoryProduct::all(),
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product, $id)
    {
        try {
            // Mengambil produk berdasarkan ID
            $product = Product::findOrFail($id);

            // Validasi data yang diperbarui
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'slug' => 'required|unique:products,slug,' . $product->id,
                'id_category' => 'required|exists:category_products,id',
                'body' => 'required',
                'harga' => 'required',
                'stock' => 'required',
                'image1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image4' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image5' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Mengupdate harga
            $validatedData['harga'] = str_replace('.', '', $validatedData['harga']);

            // Memperbarui user_id
            $validatedData['user_id'] = auth()->user()->id;

            // Mengupdate slug
            if ($validatedData['slug'] !== $product->slug) {
                $slug = $validatedData['slug'] . '-' . $product->KodeProduct;
                $validatedData['slug'] = $slug;
            } else {
                $slug = $validatedData['slug'];
            }

            // Mengupdate gambar jika ada perubahan
            for ($i = 1; $i <= 5; $i++) {
                $imageFieldName = 'image' . $i;
                if ($request->hasFile($imageFieldName)) {
                    $image = $request->file($imageFieldName);
                    if ($image->isValid()) {
                        $imageName = $image->getClientOriginalName();
                        // Membuat path penyimpanan baru dengan nama folder berdasarkan KodeProduct
                        $newFolderPath = 'Product-images/' . $product->KodeProduct;
                        // Simpan gambar ke direktori yang sesuai
                        $imagePath = $image->storeAs($newFolderPath, $imageName);
                        // Mengupdate path gambar dalam data yang divalidasi
                        $validatedData[$imageFieldName] = $imagePath;
                        // Hapus gambar lama jika ada dan ganti dengan gambar baru
                        if ($product->$imageFieldName) {
                            // Hapus gambar lama
                            Storage::delete($product->$imageFieldName);
                        }
                    } else {
                        // Handle invalid file
                        return redirect()->back()->with(['fail' => 'File yang diunggah tidak valid']);
                    }
                }
            }

            // Mengupdate produk dengan data yang divalidasi
            $product->update($validatedData);

            return redirect('/product_admin')->with('success', 'Produk berhasil diperbarui');
        } catch (ValidationException $e) {
            $errors = $e->validator->errors();
            return redirect()->back()->withErrors($errors)->with(['fail' => 'Periksa Kembali Data Anda']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['fail' => 'Terjadi kesalahan. Periksa kembali data Anda']);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Hapus folder gambar terkait
        $folderPath = 'Product-images/' . $product->KodeProduct;
        Storage::deleteDirectory($folderPath);

        // Hapus data produk
        $product->delete();

        return redirect('/product_admin')->with('success', 'Product berhasil dihapus');
    }

    public function deleteImage(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Get the image field to delete from the request
        $imageField = $request->input('imageField');

        // Check if the image field exists and if it's not null
        if ($imageField && $product->$imageField) {
            // Delete the selected image
            Storage::delete($product->$imageField);

            // Clear the reference to the image in the product model
            $product->$imageField = null;
            $product->save();

            return response()->json(['success' => 'Gambar berhasil dihapus']);
        }

        return response()->json(['error' => 'Gagal menghapus gambar'], 400);
    }
}
