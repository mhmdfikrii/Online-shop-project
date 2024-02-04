@extends('layouts.main') {{-- Login --}}
<div
  class="flex items-center justify-center h-screen pt-20 lg:pt-36 pb-16 ease-in-out duration-300"
>
  <div
    class="bg-white p-8 rounded-xl shadow-xl w-full max-w-md border-2 border-gray-300"
  >
    @if (session()->has('LoginError'))
    <div
      id="alert-2"
      class="flex items-center p-4 mb-4 text-red-600 rounded-lg bg-red-300 dark:text-red-600"
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
      <span class="sr-only">Info</span>
      <div class="ms-3 text-sm font-medium">{{ session('LoginError') }}</div>
      <button
        type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-500 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:text-red-600"
        data-dismiss-target="#alert-2"
        aria-label="Close"
      >
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
    
    @if (session()->has('RegisBerhasil'))
    <div
      id="alert-3"
      class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-300 dark:bg-gray-800 dark:text-green-400"
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
      <div class="ms-3 text-sm font-medium">{{ session('RegisBerhasil') }}</div>
      
      <button
        type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
        data-dismiss-target="#alert-3"
        aria-label="Close"
      >
        <span class="sr-only">Close</span>
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
    
    @if (session()->has('RegisError'))
    <div
      id="alert-2"
      class="flex items-center p-4 mb-4 text-red-600 rounded-lg bg-red-300 dark:text-red-600"
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
      <span class="sr-only">Info</span>
      <div class="ms-3 text-sm font-medium">{{ session('RegisError') }}</div>
      <button
        type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-500 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:text-red-600"
        data-dismiss-target="#alert-2"
        aria-label="Close"
      >
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

    <h2 class="text-2xl font-semibold mb-4 dark:text-black text-center">
      Login
    </h2>

    <form action="/login" method="POST">
      @csrf
      <div class="mb-3">
        <label
          for="email"
          class="block text-sm font-medium dark:text-black after:content-['*'] after:text-pink-500 after:ml-0.5"
          >Email</label
        >
        <input
          type="email"
          id="email"
          required
          name="email"
          class="mt-1 p-2 w-full text-sm border rounded-md focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500 invalid:text-red-500 invalid:focus:border-pink-700 invalid:focus:ring-pink-700 valid:text-black"
          placeholder="Masukan Alamat Email Anda"
        />
      </div>

      <div class="mb-4">
        <label for="password" class="block text-sm font-medium dark:text-black"
          >Password</label
        >
        <input
          type="password"
          id="password"
          name="password"
          required
          class="mt-1 p-2 w-full border text-sm rounded-md dark:text-black focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500"
          placeholder="Masukan Password Anda"
        />
      </div>

      <button
        type="submit"
        class="w-full font-semibold bg-amber-400 text-white p-2 rounded-md hover:bg-amber-500 transition duration-300 ease-in-out"
      >
        Login
      </button>
    </form>
    <!-- Modal Trigger Button -->
    {{-- <span class="text-sm text-black flex items-center justify-center mt-4">
        Akun baru? <a href="#register" id="openModal"> Registration</a>
    </span> --}}
    <span class="text-sm text-black flex items-center justify-center mt-4">Akun baru? <a href="#register"
      id="openModal" class="ml-1 text-amber-400 lg:hover:text-amber-400 lg:text-black"> Registration</a></span>
    {{-- <a
      href="#register"
      id="openModal"
      class="text-sm text-black flex items-center justify-center mt-4 hover:text-amber-400"
      >Registration?</a
    > --}}
  </div>
</div>

{{-- Register --}}
<!-- Modal Container -->
<div
  id="registrationModal"
  class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center h-screen lg:pt-36 lg:pb-16"
>
  <!-- Modal Content -->
  <div
    class="bg-white p-8 m-8 rounded-xl shadow-lg w-full max-w-md relative mx-auto"
  >
    <!-- Tambahkan kelas relative -->
    <button
      id="closeModal"
      class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 cursor-pointer"
    >
      <svg
        class="h-6 w-6"
        fill="none"
        stroke="currentColor"
        viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M6 18L18 6M6 6l12 12"
        ></path>
      </svg>
    </button>

    <h2 class="text-2xl font-semibold mb-4 dark:text-black text-center">
      Registration
    </h2>

    <!-- Registration Form -->
    <form action="/register" method="POST">
      @csrf
      <div class="mb-4 flex">
        <div class="w-1/2 pr-2">
          <!-- Kolom 1 -->
          <label
            for="first_name"
            class="block text-sm font-medium text-gray-600 after:content-['*'] after:text-pink-500 after:ml-0.5"
            >Nama Depan</label
          >
          <input
            type="text"
            id="first_name"
            name="first_name"
            required
            class="mt-1 p-2 w-full border text-sm rounded-md dark:text-black focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500"
            placeholder="Masukan Nama Depan"
          />
        </div>

        <div class="w-1/2 pl-2">
          <!-- Kolom 2 -->
          <label
            for="last_name"
            class="block text-sm font-medium text-gray-600 after:content-['*'] after:text-pink-500 after:ml-0.5"
            >Nama Belakang</label
          >
          <input
            type="text"
            id="last_name"
            name="last_name"
            required
            class="mt-1 p-2 w-full border text-sm rounded-md dark:text-black focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500"
            placeholder="Masukan Nama Belakang"
          />
        </div>
      </div>

      <div class="mb-4">
        <label
          for="nohp"
          class="block text-sm font-medium text-gray-600 after:content-['*'] after:text-pink-500 after:ml-0.5"
          >No. Handphone</label
        >
        <input
          type="number"
          id="nohp"
          name="nohp"
          required
          class="mt-1 p-2 w-full border text-sm rounded-md dark:text-black focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500"
        />
      </div>

      <div class="mb-4">
        <label
          for="email"
          class="block text-sm font-medium text-gray-600 after:content-['*'] after:text-pink-500 after:ml-0.5"
          >Email</label
        >
        <input
          type="email"
          id="email"
          name="email"
          required
          class="mt-1 p-2 w-full border text-sm rounded-md dark:text-black focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500 invalid:text-red-500 invalid:focus:border-pink-700 invalid:focus:ring-pink-700 valid:text-black"
          placeholder="Masukan Alamat Email Anda"
        />
      </div>

      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-600"
          >Password</label
        >
        <input
          type="password"
          id="password"
          required
          name="password"
          class="mt-1 p-2 w-full border text-sm rounded-md dark:text-black focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500"
          placeholder="Masukan Password Anda"
        />
      </div>

      <div class="mb-4">
        <label
          for="confirm_password"
          class="block text-sm font-medium text-gray-600"
          >Konfirmasi Password</label
        >
        <input
          type="password"
          id="confirm_password"
          required
          name="confirm_password"
          class="mt-1 p-2 w-full border text-sm rounded-md dark:text-black focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500"
          placeholder="Konfirmasi Password Anda"
        />
      </div>

      <button
        type="submit"
        class="w-full bg-amber-400 hover:bg-amber-500 text-white p-2 rounded-md"
      >
        Register
      </button>
    </form>
  </div>
</div>