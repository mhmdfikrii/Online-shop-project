<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        $product = Product::all();
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

            $validatedData['user_id'] = auth()->user()->id;

            // Create folder for product images based on product slug
            $folderPath = 'product-images/' . $validatedData['slug'];
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, 0777, true);
            }

            $images = [];
            foreach (range(1, 5) as $index) {
                if ($request->hasFile('image' . $index)) {
                    $image = $request->file('image' . $index);
                    if ($image->isValid()) {
                        $imageName = $image->getClientOriginalName();
                        $imagePath = $image->storeAs($folderPath, $imageName);
                        $images[] = $imagePath;
                    } else {
                        // Handle invalid file
                        return redirect()->back()->with(['fail' => 'File yang diunggah tidak valid']);
                    }
                }
            }

            // Set image path(s) directly to validatedData
            $validatedData['image'] = implode(',', $images);

            // Create Product with validated data
            $product = Product::create($validatedData);

            return redirect('/tambah-produk')->with('success', 'Produk berhasil ditambahkan');
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
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
