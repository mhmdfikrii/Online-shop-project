@extends('dashboard.layouts.main') @section('content')

<div class="p-4 sm:ml-64">
  <div class="p-3">
    <h1 class="font-bold text-2xl uppercase mb-5">Address</h1>
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