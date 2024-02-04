@extends('dashboard.layouts.main') @section('content')

<div class="p-4 sm:ml-64">
  <div class="p-3">
    <h1 class="font-bold text-2xl uppercase mb-5">Alamat</h1>

    @if (session()->has('success'))
    <div id="alert-border-3" class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
      <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
      </svg>
      <div class="ms-3 text-sm font-medium">
        {{ session('success') }}
      </div>
      <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-3" aria-label="Close">
        <span class="sr-only">Dismiss</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
      </button>
    </div>
    @endif

    @if (session()->has('fail'))
    <div id="alert-border-2" class="flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800" role="alert">
      <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
      </svg>
      <div class="ms-3 text-sm font-medium">
        {{ session('fail') }}
      </div>
      <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-2" aria-label="Close">
        <span class="sr-only">Dismiss</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
      </button>
    </div>
    @endif

    <div class="border-2 rounded-xl p-4 mb-4">
    <form action="/tambah_alamat" method="POST">
      @csrf
      <div class="sm:grid sm:grid-cols-2 gap-4 mx-auto">
      <div class="h-24 rounded">
        <label for="message" class="text-sm">Nama Penerima</label>
        <input
          name="penerima"
          id="penerima"
          type="text"
          required
          placeholder="Nama Penerima Pesanan"
          class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900"
        />
      </div>
      <div class="h-24 rounded">
        <label for="message" class="text-sm">Nomer Telpon Penerima</label>
        <input
          name="nohp_penerima"
          id="nohp_penerima"
          type="number"
          placeholder="Nomer Telpon Penerima"
          class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900"
        />
      </div>
      </div>
      <div class="h-24 rounded">
        <label for="message" class="text-sm">Alamat</label>
        <input
          name="alamat"
          id="alamat"
          required
          type="text"
          placeholder="Alamat Lengkap"
          class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900"
        />
      </div>
      <div class="sm:grid sm:grid-cols-3 gap-4 mx-auto">
        <div class="sm:grid sm:grid-cols-2 gap-2">
          <div class="h-24 rounded">
            <div class="col-span-full sm:col-span-2">
              <label for="RT" class="text-sm">RT</label>
              <input
                name="RT"
                id="RT"
                required
                type="number"
                placeholder="RT"
                class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900"
              />
            </div>
          </div>
          <div class="h-24 rounded">
            <div class="col-span-full sm:col-span-2">
              <label for="RW" class="text-sm">RW</label>
              <input
                name="RW"
                id="RW"
                required
                type="number"
                placeholder="RW"
                class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900"
              />
            </div>
          </div>
        </div>

        <div class="h-24 rounded">
          <div class="col-span-full sm:col-span-3">
            <label for="kelurahan" class="text-sm">Kelurahan</label>
            <input
              name="kelurahan"
              id="kelurahan"
              required
              type="text"
              placeholder="Kelurahan"
              class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900"
            />
          </div>
        </div>

        <div class="h-24 rounded">
          <div class="col-span-full sm:col-span-3">
            <label for="kecamatan" class="text-sm">Kecamatan</label>
            <input
              name="kecamatan"
              id="kecamatan"
              type="text"
              required
              placeholder="Kecamatan"
              class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900"
            />
          </div>
        </div>

        <div class="h-24 rounded">
          <div class="col-span-full sm:col-span-3">
            <label for="provinsi" class="text-sm">Provinsi</label>
            <select
              name="provinsi"
              id="provinsi"
              required
              class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900"
            >
              <option value="" selected disabled>Pilih Provinsi</option>
              <option value="Nanggroe Aceh Darussalam">
                Nanggroe Aceh Darussalam
              </option>
              <option value="Sumatera Utara">Sumatera Utara</option>
              <option value="Sumatera Selatan">Sumatera Selatan</option>
              <option value="Sumatera Barat">Sumatera Barat</option>
              <option value="Riau">Riau</option>
              <option value="Kepulauan Riau">Kepulauan Riau</option>
              <option value="Jambi">Jambi</option>
              <option value="Sumatera Selatan">Sumatera Selatan</option>
              <option value="Bengkulu">Bengkulu</option>
              <option value="Lampung">Lampung</option>
              <option value="Bangka Belitung">Bangka Belitung</option>
              <option value="DKI Jakarta">DKI Jakarta</option>
              <option value="Jawa Barat">Jawa Barat</option>
              <option value="Banten">Banten</option>
              <option value="Jawa Tengah">Jawa Tengah</option>
              <option value="Daerah Istimewa Yogyakarta">
                Daerah Istimewa Yogyakarta
              </option>
              <option value="Jawa Timur">Jawa Timur</option>
              <option value="Bali">Bali</option>
              <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
              <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
              <option value="Kalimantan Barat">Kalimantan Barat</option>
              <option value="Kalimantan Tengah">Kalimantan Tengah</option>
              <option value="Kalimantan Selatan">Kalimantan Selatan</option>
              <option value="Kalimantan Timur">Kalimantan Timur</option>
              <option value="Kalimantan Utara">Kalimantan Utara</option>
              <option value="Sulawesi Utara">Sulawesi Utara</option>
              <option value="Sulawesi Tengah">Sulawesi Tengah</option>
              <option value="Sulawesi Barat">Sulawesi Barat</option>
              <option value="Sulawesi Selatan">Sulawesi Selatan</option>
              <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
              <option value="Gorontalo">Gorontalo</option>
              <option value="Maluku">Maluku</option>
              <option value="Maluku Utara">Maluku Utara</option>
              <option value="Papua Barat">Papua Barat</option>
              <option value="Papua">Papua</option>
              <option value="Papua Tengah">Papua Tengah</option>
              <option value="Papua Pegunungan">Papua Pegunungan</option>
              <option value="Papua Barat Daya">Papua Barat Daya</option>
            </select>
          </div>
        </div>
        <div class="h-24 rounded">
          <div class="col-span-full sm:col-span-3">
            <label for="kota" class="text-sm">Kota/Kabupaten</label>
            <input
            name="kota"
              id="kota"
              type="text"
              required
              placeholder="Kota/Kabupaten"
              class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900"
            />
          </div>
        </div>
        <div class="h-24 rounded">
          <div class="col-span-full sm:col-span-3">
            <label for="kota" class="text-sm">Kode Pos</label>
            <input
            name="KodePos"
              id="KodePos"
              type="number"
              required
              placeholder="Kode Pos"
              class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900"
            />
          </div>
        </div>
      </div>
    </div>
    <div class="flex justify-end">
      <button
      
        type="submit"
        value="create"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 mr-3 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
      >
        Save
      </button>
      </form>
    </div>
  </div>
</div>
@endsection