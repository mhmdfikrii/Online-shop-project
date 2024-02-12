@extends('admin.layouts.main') @section('content')
<div class="p-4 sm:ml-64">
  <div class="p-4">
    <h1 class="font-bold text-2xl uppercase mb-5">Category</h1>
    @if (session()->has('success'))
    <div
      id="alert-border-3"
      class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
      role="alert"
    >
      <svg
        class="flex-shrink-0 w-4 h-4"
        aria-hidden="true"
        xmlns="http://www.w3.org/2000/svg"
        fill="currentColor"
        viewBox="0 0 20 20"
      >
        <path
          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"
        />
      </svg>
      <div class="ms-3 text-sm font-medium">{{ session('success') }}</div>
      <button
        type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
        data-dismiss-target="#alert-border-3"
        aria-label="Close"
      >
        <span class="sr-only">Dismiss</span>
        <svg
          class="w-3 h-3"
          aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 14 14"
        >
          <path
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
          />
        </svg>
      </button>
    </div>
    @endif @if (session()->has('fail'))
    <div
      id="alert-border-2"
      class="flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800"
      role="alert"
    >
      <svg
        class="flex-shrink-0 w-4 h-4"
        aria-hidden="true"
        xmlns="http://www.w3.org/2000/svg"
        fill="currentColor"
        viewBox="0 0 20 20"
      >
        <path
          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"
        />
      </svg>
      <div class="ms-3 text-sm font-medium">{{ session('fail') }}</div>
      <button
        type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
        data-dismiss-target="#alert-border-2"
        aria-label="Close"
      >
        <span class="sr-only">Dismiss</span>
        <svg
          class="w-3 h-3"
          aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 14 14"
        >
          <path
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
          />
        </svg>
      </button>
    </div>
    @endif

    <div class="border-2 rounded-xl p-4 mb-4">
      <h1 class="font-bold text-l uppercase mb-5 text-center">
        Tambah Kategori
      </h1>
      <form action="/create-category" method="POST">
        @csrf
        <div class="h-24 rounded">
          <label for="message" class="text-sm">Nama Kategori</label>
          <input
            name="name_category"
            id="name_category"
            type="text"
            oninput="generateSlug()"
            required
            placeholder="Nama Kategori"
            class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900"
          />
        </div>

        <div class="h-24 rounded">
          <label for="message" class="text-sm">Slug</label>
          <input
            name="slug"
            id="slug"
            type="text"
            readonly
            required
            placeholder="Link Produk yang dijual"
            class="w-full rounded-md cursor-not-allowed pointer-events-none focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900"
          />
        </div>
        <div class="flex justify-end">
          <button
            type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 mr-3 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
          >
            Save
          </button>
        </div>
      </form>
    </div>
    <div class="border-2 rounded-xl p-4 mb-4">
      <h1 class="font-bold text-l uppercase mb-5 text-center">Kategori</h1>

      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table
          class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
        >
          <thead
            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
          >
            <tr>
              <th scope="col" class="px-6 py-3">Nama Kategori</th>
              <th scope="col" class="px-6 py-3">Slug</th>
              <th scope="col" class="px-6 py-3">Aksi</th>
            </tr>
          </thead>
          @foreach ($kategori as $kategori_produk)

          <tbody>
            <tr
              class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
            >
              <th
                scope="row"
                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white uppercase"
              >
                {{ $kategori_produk->name_category }}
              </th>
              <td class="px-6 py-4">{{ $kategori_produk->slug }}</td>
              <td class="px-6 py-4">
                <form
                  action="/create-category/{{ $kategori_produk->id }}"
                  method="POST"
                >
                  @csrf @method('delete')
                  <button
                    type="submit"
                    onclick="return confirm('Apakah Kamu Mau Menghapus Kategori Ini??')"
                    class="px-3 py-2 text-lg font-medium text-center text-white bg-red-500 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                  >
                    <i class="bi bi-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
          </tbody>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>

<script>
  function generateSlug() {
    const titleInput = document.getElementById("name_category");
    const slugInput = document.getElementById("slug");

    // Generate slug from the title
    const slug = titleInput.value
      .toLowerCase()
      .replace(/[^a-z0-9 -]/g, "") // Remove unwanted characters
      .replace(/\s+/g, "-") // Replace spaces with hyphens
      .replace(/-+/g, "-"); // Remove consecutive hyphens

    slugInput.value = slug;
  }
</script>

@endsection
