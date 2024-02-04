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
    <form action="/edit_alamat/{{ $alamat->id }}" method="POST">
    @method('PUT')
      @csrf
      <div class="sm:grid sm:grid-cols-2 gap-4 mx-auto">
      <div class="h-24 rounded">
        <label for="message" class="text-sm">Nama Penerima</label>
        <input
          name="penerima"
          id="penerima"
          required
          type="text"
          value="{{ old('penerima', $alamat->penerima) }}"
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
          required
          value="{{ old('nohp_penerima', $alamat->nohp_penerima) }}"
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
          required
          value="{{ old('alamat', $alamat->alamat) }}"
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
                value="{{ old('RT', $alamat->RT) }}"
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
                value="{{ old('RW', $alamat->RW) }}"
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
              value="{{ old('kelurahan', $alamat->kelurahan) }}"
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
              required
              value="{{ old('kecamatan', $alamat->kecamatan) }}"
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
              required
              class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900"
            >
              <option value="" selected disabled>Pilih Provinsi</option>
              <option value="Nanggroe Aceh Darussalam" {{ old('provinsi', $alamat->provinsi) == 'Nanggroe Aceh Darussalam' ? 'selected' : '' }}>
                Nanggroe Aceh Darussalam
              </option>
              <option value="Sumatera Utara" {{ old('provinsi', $alamat->provinsi) == 'Sumatera Utara' ? 'selected' : '' }}>
              Sumatera Utara
              </option>
               <option value="Sumatera Selatan" {{ old('provinsi', $alamat->provinsi) == 'Sumatera Selatan' ? 'selected' : '' }}>
              Sumatera Selatan
              </option>
              <option value="Sumatera Barat" {{ old('provinsi', $alamat->provinsi) == 'Sumatera Barat' ? 'selected' : '' }}>
              Sumatera Barat
              </option>
              <option value="Riau" {{ old('provinsi', $alamat->provinsi) == 'Riau' ? 'selected' : '' }}>
              Riau
              </option>
              <option value="Kepulauan Riau" {{ old('provinsi', $alamat->provinsi) == 'Kepulauan Riau' ? 'selected' : '' }}>
              Kepulauan Riau
              </option>
              <option value="Jambi" {{ old('provinsi', $alamat->provinsi) == 'Jambi' ? 'selected' : '' }}>
              Jambi
              </option>
              <option value="Sumatera Selatan" {{ old('provinsi', $alamat->provinsi) == 'Sumatera Selatan' ? 'selected' : '' }}>
              Sumatera Selatan
              </option>
              <option value="Bengkulu" {{ old('provinsi', $alamat->provinsi) == 'Bengkulu' ? 'selected' : '' }}>
              Bengkulu
              </option>
              <option value="Lampung" {{ old('provinsi', $alamat->provinsi) == 'Lampung' ? 'selected' : '' }}>
              Lampung
              </option>
              <option value="Bangka Belitung" {{ old('provinsi', $alamat->provinsi) == 'Bangka Belitung' ? 'selected' : '' }}>
              Bangka Belitung
              </option>
              <option value="DKI Jakarta" {{ old('provinsi', $alamat->provinsi) == 'DKI Jakarta' ? 'selected' : '' }}>
              DKI Jakarta
              </option>
              <option value="Jawa Barat" {{ old('provinsi', $alamat->provinsi) == 'Jawa Barat' ? 'selected' : '' }}>
              Jawa Barat
              </option>
              <option value="Banten" {{ old('provinsi', $alamat->provinsi) == 'Banten' ? 'selected' : '' }}>
              Banten
              </option>
              <option value="Jawa Tengah" {{ old('provinsi', $alamat->provinsi) == 'Jawa Tengah' ? 'selected' : '' }}>
              Jawa Tengah
              </option>
              <option value="Daerah Istimewa Yogyakarta" {{ old('provinsi', $alamat->provinsi) == 'Daerah Istimewa Yogyakarta' ? 'selected' : '' }}>
              Daerah Istimewa Yogyakarta
              </option>
              <option value="Jawa Timur" {{ old('provinsi', $alamat->provinsi) == 'Jawa Timur' ? 'selected' : '' }}>
              Jawa Timur
              </option>
              <option value="Bali" {{ old('provinsi', $alamat->provinsi) == 'Bali' ? 'selected' : '' }}>
              Bali
              </option>
              <option value="Nusa Tenggara Barat" {{ old('provinsi', $alamat->provinsi) == 'Nusa Tenggara Barat' ? 'selected' : '' }}>
              Nusa Tenggara Barat
              </option>
              <option value="Nusa Tenggara Timur" {{ old('provinsi', $alamat->provinsi) == 'Nusa Tenggara Timur' ? 'selected' : '' }}>
              Nusa Tenggara Timur
              </option>
              <option value="Kalimantan Barat" {{ old('provinsi', $alamat->provinsi) == 'Kalimantan Barat' ? 'selected' : '' }}>
              Kalimantan Barat
              </option>
              <option value="Kalimantan Tengah" {{ old('provinsi', $alamat->provinsi) == 'Kalimantan Tengah' ? 'selected' : '' }}>
              Kalimantan Tengah
              </option>
              <option value="Kalimantan Selatan" {{ old('provinsi', $alamat->provinsi) == 'Kalimantan Selatan' ? 'selected' : '' }}>
              Kalimantan Selatan
              </option>
              <option value="Kalimantan Timur" {{ old('provinsi', $alamat->provinsi) == 'Kalimantan Timur' ? 'selected' : '' }}>
              Kalimantan Timur
              </option>
              <option value="Kalimantan Utara" {{ old('provinsi', $alamat->provinsi) == 'Kalimantan Utara' ? 'selected' : '' }}>
              Kalimantan Utara
              </option>
              <option value="Sulawesi Utara" {{ old('provinsi', $alamat->provinsi) == 'Sulawesi Utara' ? 'selected' : '' }}>
              Sulawesi Utara
              </option>
              <option value="Sulawesi Tengah" {{ old('provinsi', $alamat->provinsi) == 'Sulawesi Tengah' ? 'selected' : '' }}>
              Sulawesi Tengah
              </option>
              <option value="Sulawesi Barat" {{ old('provinsi', $alamat->provinsi) == 'Sulawesi Barat' ? 'selected' : '' }}>
              Sulawesi Barat
              </option>
              <option value="Sulawesi Selatan" {{ old('provinsi', $alamat->provinsi) == 'Sulawesi Selatan' ? 'selected' : '' }}>
              Sulawesi Selatan
              </option>
              <option value="Sulawesi Tenggara" {{ old('provinsi', $alamat->provinsi) == 'Sulawesi Tenggara' ? 'selected' : '' }}>
              Sulawesi Tenggara
              </option>
              <option value="Gorontalo" {{ old('provinsi', $alamat->provinsi) == 'Gorontalo' ? 'selected' : '' }}>
              Gorontalo
              </option>
              <option value="Maluku" {{ old('provinsi', $alamat->provinsi) == 'Maluku' ? 'selected' : '' }}>
              Maluku
              </option>
              <option value="Maluku Utara" {{ old('provinsi', $alamat->provinsi) == 'Maluku Utara' ? 'selected' : '' }}>
              Maluku Utara
              </option>
              <option value="Papua Barat" {{ old('provinsi', $alamat->provinsi) == 'Papua Barat' ? 'selected' : '' }}>
              Papua Barat
              </option>
              <option value="Papua" {{ old('provinsi', $alamat->provinsi) == 'Papua' ? 'selected' : '' }}>
              Papua
              </option>
              <option value="Papua Tengah" {{ old('provinsi', $alamat->provinsi) == 'Papua Tengah' ? 'selected' : '' }}>
              Papua Tengah
              </option>
              <option value="Papua Pegunungan" {{ old('provinsi', $alamat->provinsi) == 'Papua Pegunungan' ? 'selected' : '' }}>
              Papua Pegunungan
              </option>
              <option value="Papua Barat Daya" {{ old('provinsi', $alamat->provinsi) == 'Papua Barat Daya' ? 'selected' : '' }}>
              Papua Barat Daya
              </option>
            </select>
          </div>
        </div>
        <div class="h-24 rounded">
          <div class="col-span-full sm:col-span-3">
            <label for="kota" class="text-sm">Kota/Kabupaten</label>
            <input
            name="kota"
              id="kota"
              required
              value="{{ old('kota', $alamat->kota) }}"
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
              required
              value="{{ old('KodePos', $alamat->KodePos) }}"
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