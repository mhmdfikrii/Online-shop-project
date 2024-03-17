<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ContentPromo;
use App\Http\Requests\UpdateContentPromoRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContentPromoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ContentPromo $content)
    {
        $content = ContentPromo::all();
        // dd($product);
        return view('admin.product.content.index', [
            'title' => 'Konten Promo',
            'content' => $content
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.content.create', [
            'title' => 'Tambah Konten Promo',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'promo' => 'required|max:255',
                'slug' => 'required|max:255|unique:content_promos',
                'image_promo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $validatedData['user_id'] = auth()->user()->id;

            if ($request->file('image_promo')) {
                $validatedData['image_promo'] = $request->file('image_promo')->store('Content-images');
            }

            // Create Product with validated data
            // dd($validatedData);
            ContentPromo::create($validatedData);

            return redirect('/konten-promo')->with('success', 'Konten berhasil ditambahkan');
        } catch (ValidationException $e) {
            $errors = $e->validator->errors();
            // dd($errors);
            return redirect()->back()->withErrors($errors)->with(['fail' => 'Periksa Kembali Data Anda']);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(ContentPromo $contentPromo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContentPromo $contentPromo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContentPromoRequest $request, ContentPromo $contentPromo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Temukan konten promo berdasarkan ID
            $contentPromo = ContentPromo::findOrFail($id);

            // Hapus gambar terkait jika ada
            if ($contentPromo->image_promo) {
                Storage::delete($contentPromo->image_promo);
            }

            // Hapus konten promo dari database
            $contentPromo->delete();

            return redirect('/konten-promo')->with('success', 'Konten berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with(['fail' => 'Gagal menghapus konten promo']);
        }
    }
}
