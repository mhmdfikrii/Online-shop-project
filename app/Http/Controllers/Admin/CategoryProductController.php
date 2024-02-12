<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Http\Requests\StoreCategoryProductRequest;
use App\Http\Requests\UpdateCategoryProductRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryProduct $category)
    {
        $category = CategoryProduct::all();
        return view('admin.product.category.index', [
            'title' => 'Category Produk',
            'kategori' => $category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name_category' => 'required|max:255',
                'slug' => 'required|max:255|unique:category_products',
            ]);

            CategoryProduct::create($validatedData);

            return redirect('/create-category')->with('success', 'Kategori berhasil ditambahkan');
        } catch (ValidationException $e) {
            $errors = $e->validator->errors(); {
                return redirect()->back()->withErrors($errors)->with(['fail' => 'Periksa Kembali Data Anda']);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryProduct $categoryProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryProduct $categoryProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryProductRequest $request, CategoryProduct $categoryProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = CategoryProduct::findOrFail($id);
        $category->delete();

        return redirect('/create-category')->with('success', 'Kategori berhasil dihapus');
    }
}
