@extends('admin.layouts.main') @section('content')

<div class="p-4 sm:ml-64">
    <div class="p-4">
        <h1 class="font-bold text-2xl uppercase mb-5">Edit Produk</h1>

        @if (session()->has('success'))
        <div id="alert-border-3" class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <div class="ms-3 text-sm font-medium">{{ session('success') }}</div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-3" aria-label="Close">
                <span class="sr-only">Dismiss</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
        @endif @if (session()->has('fail'))
        <div id="alert-border-2" class="flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <div class="ms-3 text-sm font-medium">{{ session('fail') }}</div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-2" aria-label="Close">
                <span class="sr-only">Dismiss</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
        @endif

        <div class="border-2 rounded-xl p-4 mb-4">
            <form action="/edit-produk/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="h-24 rounded">
                    <label for="message" class="text-sm">Nama Produk</label>
                    <input name="title" value="{{ old('title', $product->title) }}" id="title" type="text" oninput="generateSlug()" required placeholder="Nama Produk yang dijual" class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900" />
                </div>

                <div class="h-24 rounded">
                    <label for="message" class="text-sm">Slug</label>
                    <input name="slug" value="{{ old('slug', $product->slug) }}" id="slug" type="text" readonly required placeholder="Nama Produk yang dijual" class="w-full rounded-md cursor-not-allowed pointer-events-none focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900" />
                </div>

                <div class="h-24 rounded">
                    <div class="col-span-full sm:col-span-3">
                        <label for="kategori" class="text-sm">Kategori Produk</label>
                        <select name="id_category" id="id_category" required class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900">
                            <option value="" disabled>Pilih Kategori</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('id_category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name_category }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="kategori" class="text-sm">Gambar Produk (Wajib Minimal 2 Gambar)</label>
                </div>
                <div class="overflow-x-auto">
                    <div class="flex gap-4">

                        <div>
                            <div class="text-center">
                                <label class="text-sm rounded-lg border border-white "></label>
                            </div>
                            <div class="h-48 w-48 rounded border border-gray-300 flex-shrink-0 relative">
                                <label for="image1" class="text-sm flex justify-center items-center">Gambar Produk 1</label>
                                <div class="absolute inset-0 flex justify-center items-center">
                                    <input name="image1" id="image1" type="file" accept="image/*" class="w-full h-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900 opacity-0 absolute" />
                                </div>
                                <img id="preview1" src="{{ asset('storage/' . $product->image1) }}" class="-mt-5 w-full h-full rounded" alt="Preview Gambar">
                            </div>
                        </div>

                        <div>
                            <div class="text-center">
                                <label class="text-sm rounded-lg border border-white "></label>
                            </div>
                            <div class="h-48 w-48 rounded border border-gray-300 flex-shrink-0 relative">
                                <label for="image2" class="text-sm flex justify-center items-center">Gambar Produk 2</label>
                                <div class="absolute inset-0 flex justify-center items-center">
                                    <input name="image2" accept="image/*" id="image2" type="file" class="w-full h-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900 opacity-0 absolute" />
                                </div>
                                <img id="preview2" src="{{ asset('storage/' . $product->image2) }}" class="-mt-5 w-full h-full rounded" alt="Preview Gambar">
                            </div>
                        </div>

                        <div>
                            <div class="text-center">
                                <div class="text-center">
                                    <button class="delete-image-btn" type="button" data-image-id="{{ $product->id }}" data-image-field="image3"><i class="text-sm rounded-lg border bg-red-200 bi bi-trash"></i></button>
                                </div>
                            </div>
                            <div class="h-48 w-48 rounded border border-gray-300 flex-shrink-0 relative">
                                <label for="image3" class="text-sm flex justify-center items-center">Gambar Produk 3</label>
                                <div class="absolute inset-0 flex justify-center items-center">
                                    <input name="image3" accept="image/*" id="image3" type="file" class="w-full h-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900 opacity-0 absolute" />
                                </div>

                                @if($product->image3)
                                <img id="preview3" src="{{ asset('storage/' . $product->image3) }}" class="-mt-5 w-full h-full rounded">
                                @else
                                <img id="preview3" class="-mt-5 w-full h-full rounded hidden">
                                @endif
                            </div>
                        </div>

                        <div>
                            <div class="text-center">
                                <div class="text-center">
                                    <button class="delete-image-btn" type="button" data-image-id="{{ $product->id }}" data-image-field="image4"><i class="text-sm rounded-lg border bg-red-200 bi bi-trash"></i></button>
                                </div>
                            </div>
                            <div class="h-48 w-48 rounded border border-gray-300 flex-shrink-0 relative">
                                <label for="image4" class="text-sm flex justify-center items-center">Gambar Produk 4</label>
                                <div class="absolute inset-0 flex justify-center items-center">
                                    <input name="image4" accept="image/*" id="image4" type="file" class="w-full h-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900 opacity-0 absolute" />
                                </div>

                                @if($product->image4)
                                <img id="preview4" src="{{ asset('storage/' . $product->image4) }}" class="-mt-5 w-full h-full rounded">
                                @else
                                <img id="preview4" class="-mt-5 w-full h-full rounded hidden">
                                @endif
                            </div>
                        </div>

                        <div>
                            <div class="text-center">
                                <div class="text-center">
                                    <button class="delete-image-btn" type="button" data-image-id="{{ $product->id }}" data-image-field="image5"><i class="text-sm rounded-lg border bg-red-200 bi bi-trash"></i></button>
                                </div>
                            </div>
                            <div class="h-48 w-48 rounded border border-gray-300 flex-shrink-0 relative">
                                <label for="image5" class="text-sm flex justify-center items-center">Gambar Produk 5</label>
                                <div class="absolute inset-0 flex justify-center items-center">
                                    <input name="image5" accept="image/*" id="image5" type="file" class="w-full h-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900 opacity-0 absolute" />
                                </div>

                                @if($product->image5)
                                <img id="preview5" src="{{ asset('storage/' . $product->image5) }}" class="-mt-5 w-full h-full rounded">
                                @else
                                <img id="preview5" class="-mt-5 w-full h-full rounded hidden">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rounded mb-4 mt-4">
                    <label for="message" class="text-sm">Keterangan Produk</label>
                    <div class="max-h-auto overflow-y-auto">
                        <input id="body" type="hidden" value="{{ old('body', $product->body) }}" name="body" class="overflow-y-auto" />
                        <trix-editor input="body" class="rounded-md overflow-y-auto"></trix-editor>
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-2 gap-2">
                    <div class="h-24 rounded">
                        <label for="harga" class="text-sm">Harga</label>
                        <div class="flex">
                            <span class="flex items-center px-3 rounded-l-md bg-gray-400">Rp.</span>
                            <input name="harga" value="{{ old('harga', number_format($product->harga, 0, ',', '.')) }}" id="harga" type="text" oninput="formatNumber(this)" required placeholder="Harga Produk yang dijual" class="flex flex-1 w-full rounded-r-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900" />
                        </div>
                    </div>

                    <div class="h-24 rounded">
                        <label for="message" class="text-sm">Stok</label>
                        <input name="stock" value="{{ old('stock', $product->stock) }}" id="stock" type="number" required placeholder="Stok yang tersedia" class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900" />
                    </div>
                </div>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 mr-3 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Save
            </button>
        </div>
        </form>
    </div>
</div>

{{-- Preview Gambar --}}
<script>
    // Function to handle file input change for each image
    function handleImagePreview(input, previewId) {
        const file = input.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            const preview = document.getElementById(previewId);
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        }

        reader.readAsDataURL(file);
    }

    // Add event listeners for each image input
    document.getElementById('image1').addEventListener('change', function(event) {
        handleImagePreview(this, 'preview1');
    });
    document.getElementById('image2').addEventListener('change', function(event) {
        handleImagePreview(this, 'preview2');
    });
    document.getElementById('image3').addEventListener('change', function(event) {
        handleImagePreview(this, 'preview3');
    });
    document.getElementById('image4').addEventListener('change', function(event) {
        handleImagePreview(this, 'preview4');
    });
    document.getElementById('image5').addEventListener('change', function(event) {
        handleImagePreview(this, 'preview5');
    });
</script>


<script>
    function generateSlug() {
        const titleInput = document.getElementById('title');
        const slugInput = document.getElementById('slug');

        // Generate slug from the title
        const slug = titleInput.value
            .toLowerCase()
            .replace(/[^a-z0-9 -]/g, '') // Remove unwanted characters
            .replace(/\s+/g, '-') // Replace spaces with hyphens
            .replace(/-+/g, '-'); // Remove consecutive hyphens

        slugInput.value = slug;
    }
</script>

<script>
    function formatNumber(input) {
        // Remove non-numeric characters from the input
        const numericValue = input.value.replace(/\D/g, '');

        // Format the number with commas
        const formattedValue = Number(numericValue).toLocaleString('id-ID');

        // Update the input value with the formatted number
        input.value = `${formattedValue}`;
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.delete-image-btn').click(function() {
        var productId = $(this).data('image-id');
        var imageField = $(this).data('image-field');
        
        // Konfirmasi penghapusan gambar
        var confirmation = confirm('Apakah Anda yakin ingin menghapus gambar ini?');
        
        if (confirmation) {
            $.ajax({
                url: '/delete-image/' + productId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}',
                    imageField: imageField // Kirim nama kolom gambar
                },
                success: function(response) {
                    alert('Gambar berhasil dihapus');
                    location.reload(); // Reload halaman setelah penghapusan berhasil
                },
                error: function(xhr) {
                    alert('Terjadi kesalahan saat menghapus gambar');
                }
            });
        } else {
            // Jika pengguna membatalkan penghapusan, tidak perlu melakukan reload
            // alert('Penghapusan gambar dibatalkan');
        }
    });
});
</script>


@endsection