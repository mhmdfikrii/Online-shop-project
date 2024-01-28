@extends('dashboard.layouts.main') @section('content')

<div class="p-4 sm:ml-64">
  <div class="p-3">
    <form action="/users_details/{{ auth()->user()->id }}" id="form1" method="POST">

      <h1 class="font-bold text-2xl uppercase mb-5">Profil Diri</h1>

      @method('PUT')
      @csrf

      <div class="border-2 rounded-xl p-4 mb-4">
        <div class="col-span-full sm:w-1/2 mb-5">
          <label for="username" class="text-sm">Username</label>
          <input name="username" id="username" type="text" placeholder="Username" value="{{ old('username', auth()->user()->username) }}" class="w-full rounded-md focus:ring-blue-500 focus:border-blue-500 dark:border-gray-700 dark:text-gray-900" required />
          <span class="availability-message text-sm"></span>
        </div>
        <div class="sm:grid sm:grid-cols-3 gap-4 mx-auto">
          <div class="h-15 rounded">
            <div class="col-span-full sm:col-span-3">
              <label for="first_name" class="text-sm">Nama Pertama</label>
              <input name="first_name" id="first_name" type="text" placeholder="First name" value="{{ old('first_name', auth()->user()->first_name) }}" class="w-full rounded-md focus:ring-blue-500 focus:border-blue-500 dark:border-gray-700 dark:text-gray-900" required />
            </div>
          </div>
          <div class="h-15 rounded">
            <div class="col-span-full sm:col-span-3">
              <label for="last_name" class="text-sm">Nama Belakang</label>
              <input name="last_name" id="last_name" type="text" placeholder="Last name" value="{{ old('last_name', auth()->user()->last_name) }}" class="w-full rounded-md focus:ring-blue-500 focus:border-blue-500 dark:border-gray-700 dark:text-gray-900" required />
            </div>
          </div>
          <div class="h-15 rounded">
            <div class="col-span-full sm:col-span-3">
              <label for="full_name" class="text-sm">Nama Lengkap</label>
              <input name="full_name" id="full_name" type="text" placeholder="Full name" readonly value="{{ old('full_name', auth()->user()->full_name) }}" class="w-full rounded-md dark:border-gray-700 dark:text-gray-900 cursor-not-allowed pointer-events-none focus:ring-transparent" required />
            </div>
          </div>
          <div class="h-15 rounded">
            <div class="col-span-full sm:col-span-3">
              <label for="gender" class="text-sm">Jenis Kelamin</label>
              <select name="gender" id="gender" class="w-full rounded-md focus:ring-blue-500 focus:border-blue-500 dark:border-gray-700 dark:text-gray-900" required>
                <option value="" selected disabled>Pilih Jenis Kelamin</option>
                <option value="Laki-Laki" @if(old('gender', auth()->user()->gender) == "Laki-Laki") selected @endif>Laki-Laki</option>
                <option value="Perempuan" @if(old('gender', auth()->user()->gender) == "Perempuan") selected @endif>Perempuan</option>
              </select>
            </div>
          </div>
          <div class="h-15 rounded">
            <div class="col-span-full sm:col-span-3">
              <label for="nohp" class="text-sm">No. Hp</label>
              <input name="nohp" id="nohp" type="number" placeholder="No. Hp" value="{{ old('nohp', auth()->user()->nohp) }}" class="w-full rounded-md focus:ring-blue-500 focus:border-blue-500 dark:border-gray-700 dark:text-gray-900" required />
            </div>
          </div>
          <div class="h-15 rounded">
            <div class="col-span-full sm:col-span-3">
              <label for="firstname" class="text-sm">E-mail</label>
              <input name="email" id="email" type="email" placeholder="E-Mail" readonly value="{{ old('email', auth()->user()->email) }}" class="w-full rounded-md focus:ring-blue-500 focus:border-blue-500 dark:border-gray-700 dark:text-gray-900 cursor-not-allowed pointer-events-none focus:ring-transparent" />
            </div>
          </div>
          <div class="h-15 rounded">
            <div class="col-span-full sm:col-span-3">
              <label for="firstname" class="text-sm">Tanggal Lahir</label>
              <div class="relative max-w-sm">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                  <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                  </svg>
                </div>
                <input datepicker name="tgllahir" readonly value="{{ old('tgllahir', auth()->user()->tgllahir) }}" type="text" required class="border-2 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
              </div>
            </div>
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
</div>
@endsection