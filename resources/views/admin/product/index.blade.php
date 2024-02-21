@extends('admin.layouts.main') @section('content')

<div class="p-4 sm:ml-64">
  <div class="p-4">
    <h1 class="font-bold text-2xl uppercase mb-5">Produk Penjualan</h1>

    @if (session()->has('success'))
    <div id="alert-border-3"
      class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
      role="alert">
      <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
        viewBox="0 0 20 20">
        <path
          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
      </svg>
      <div class="ms-3 text-sm font-medium">{{ session('success') }}</div>
      <button type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
        data-dismiss-target="#alert-border-3" aria-label="Close">
        <span class="sr-only">Dismiss</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
      </button>
    </div>
    @endif @if (session()->has('fail'))
    <div id="alert-border-2"
      class="flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800"
      role="alert">
      <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
        viewBox="0 0 20 20">
        <path
          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
      </svg>
      <div class="ms-3 text-sm font-medium">{{ session('fail') }}</div>
      <button type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
        data-dismiss-target="#alert-border-2" aria-label="Close">
        <span class="sr-only">Dismiss</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
      </button>
    </div>
    @endif

    <div class="flex justify-end">
      <a href="/tambah-produk">
        <button type="button"
          class="text-white bg-amber-400 mb-7 hover:bg-amber-500 font-medium rounded-lg text-sm px-5 py-2.5 me-2">
          <i class="bi bi-plus-circle"></i> Tambah Produk
        </button>
      </a>

      <a href="/create-category">
        <button type="button"
          class="text-white bg-amber-400 mb-7 hover:bg-amber-500 font-medium rounded-lg text-sm px-5 py-2.5 me-2">
          <i class="bi bi-plus-circle"></i> Tambah Kategori Produk
        </button>
      </a>
    </div>
    <div class="block relative mb-3">
      <input type="text" placeholder="Masukan Pencarian..." class="w-full rounded-xl">
    </div>


    @foreach ($product as $products)
    <a href="#" class="block relative">
      <div class="border-2 rounded-xl p-4 m-2 hover:border-amber-400 relative">
        <div class="flex flex-col mb-2 rounded">
          <div class="flex font-sans">
            <div class="flex-none w-20 sm:w-40 relative">
              <img src="{{ asset('storage/' . $products->image1) }}" 
                class="absolute inset-0 w-20 sm:w-40 h-full object-cover" loading="lazy">
            </div>
            <div class="flex-auto p-6">
              <div class="flex flex-wrap">
                <h1 class="flex-auto text-lg font-semibold text-slate-900">
                  {{ $products->title }}
                </h1>
                <div class="text-lg font-semibold text-slate-500">
                    Rp. {{ number_format($products->harga, 0, ',', '.') }}
                </div>
                <div class="w-full flex-none text-sm font-medium text-slate-700 mt-2">
                  {{ $products->stock }}
                </div>
              </div>
            </div>
          </div>
          <a href="/delete">
            <div class="absolute bottom-0 right-0 m-2">
              <form action="#" method="POST">
                @csrf @method('delete')
                <button type="submit" onclick="return confirm('Apakah Kamu Mau Menghapus Alamat Ini??')"
                  class="px-3 py-2 text-lg font-medium text-center text-white bg-red-500 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  <i class="bi bi-trash"></i>
                </button>
              </form>
            </div>
          </a>
          <a href="/edit-produk/{{ $products->slug }}">
            <div class="absolute bottom-0 right-12 m-2">
              <button type="submit"
                class="px-3 py-2 text-lg font-medium text-center text-white bg-green-500 rounded-lg hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <i class="bi bi-pencil-square"></i>
              </button>
            </div>
          </a>
        </div>
      </div>
    </a>
    @endforeach

  </div>
</div>

@endsection