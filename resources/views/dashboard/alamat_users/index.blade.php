@extends('dashboard.layouts.main') @section('content')

<div class="p-4 sm:ml-64">
  <div class="p-4">
    <h1 class="font-bold text-2xl uppercase mb-5">Alamat Pengiriman</h1>
    <a href="/tambah_alamat">
      <button type="button" class="text-white bg-amber-400 mb-7 hover:bg-amber-500 font-medium rounded-lg text-sm px-5 py-2.5 me-2">
        <i class="bi bi-plus-circle"></i> Tambah Alamat
      </button>
    </a>
    @foreach ($alamat as $alamats)
    <a href="/edit_alamat/{{ $alamats->id }}" class="block relative">
      <div class="border-2 rounded-xl p-4 m-2 hover:border-amber-400 relative">
        <div class="flex flex-col mb-2 rounded">
          <span class="mb-2">{{ $alamats->penerima }}</span>
          <span class="mb-2">{{ $alamats->nohp_penerima }}</span>
          <span class="mb-2">Alamat Lengkap : {{ $alamats->alamat }}, RT/RW {{ $alamats->RT
            }}/{{ $alamats->RW }}, {{ $alamats->kecamatan }}, {{
            $alamats->kelurahan }}, {{ $alamats->kota }}, {{ $alamats->provinsi
            }}, ID {{ $alamats->KodePos }}</span>
        </div>
        <a href="/delete">
        <div class="absolute bottom-0 right-0 m-2">
          <form action="/alamat/{{ $alamats->id }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" onclick="return confirm('Apakah Kamu Mau Menghapus Alamat Ini??')" class="px-3 py-2 text-lg font-medium text-center text-white bg-red-500 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              <i class="bi bi-trash"></i>
            </button>
          </form>
        </div>
        </a>
      </div>
    </a>
    @endforeach
  </div>
</div>
@endsection