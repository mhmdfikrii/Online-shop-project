@extends('layouts.main') 

{{-- Promo --}}
<section class="mt-7 sm:mt-16 md:mt-20" id="promo">
  <div
    id="default-carousel"
    class="relative w-full container mx-auto"
    data-carousel="slide"
  >
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
      <!-- Item 1 -->
      <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <img
          src="img/gambar1.jpeg"
          class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
          alt="..."
        />
      </div>
      <!-- Item 2 -->
      <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <img
          src="img/gambar1.jpeg"
          class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
          alt="..."
        />
      </div>
      <!-- Item 3 -->
      <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <img
          src="img/gambar1.jpeg"
          class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
          alt="..."
        />
      </div>
      <!-- Item 4 -->
      <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <img
          src="img/gambar1.jpeg"
          class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
          alt="..."
        />
      </div>
      <!-- Item 5 -->
      <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <img
          src="img/gambar1.jpeg"
          class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
          alt="..."
        />
      </div>
    </div>
    <!-- Slider indicators -->
    <div
      class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse"
    >
      <button
        type="button"
        class="w-3 h-3 rounded-full"
        aria-current="true"
        aria-label="Slide 1"
        data-carousel-slide-to="0"
      ></button>
      <button
        type="button"
        class="w-3 h-3 rounded-full"
        aria-current="false"
        aria-label="Slide 2"
        data-carousel-slide-to="1"
      ></button>
      <button
        type="button"
        class="w-3 h-3 rounded-full"
        aria-current="false"
        aria-label="Slide 3"
        data-carousel-slide-to="2"
      ></button>
      <button
        type="button"
        class="w-3 h-3 rounded-full"
        aria-current="false"
        aria-label="Slide 4"
        data-carousel-slide-to="3"
      ></button>
      <button
        type="button"
        class="w-3 h-3 rounded-full"
        aria-current="false"
        aria-label="Slide 5"
        data-carousel-slide-to="4"
      ></button>
    </div>
    <!-- Slider controls -->
    <button
      type="button"
      class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
      data-carousel-prev
    >
      <span
        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none"
      >
        <svg
          class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
          aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 6 10"
        >
          <path
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M5 1 1 5l4 4"
          />
        </svg>
        <span class="sr-only">Previous</span>
      </span>
    </button>
    <button
      type="button"
      class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
      data-carousel-next
    >
      <span
        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none"
      >
        <svg
          class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
          aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 6 10"
        >
          <path
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="m1 9 4-4-4-4"
          />
        </svg>
        <span class="sr-only">Next</span>
      </span>
    </button>
  </div>
</section>

{{-- Product --}}
<section class="mb-10" id="product">
  <div class="container mx-auto">
    <div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
      <button
        type="button"
        class="text-gray-900 hover:text-white bg-gray-200 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3"
      >
        All categories
      </button>
      <button
        type="button"
        class="text-gray-900 hover:text-white bg-gray-200 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3"
      >
        Shoes
      </button>
      <button
        type="button"
        class="text-gray-900 hover:text-white bg-gray-200 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3"
      >
        Bags
      </button>
      <button
        type="button"
        class="text-gray-900 hover:text-white bg-gray-200 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3"
      >
        Electronics
      </button>
      <button
        type="button"
        class="text-gray-900 hover:text-white bg-gray-200 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3"
      >
        Gaming
      </button>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
      <a href="#">
        <div
          class="bg-white p-4 rounded-xl shadow-md hover:border-red-500 hover:border-2"
        >
          <img
            class="w-full h-auto rounded-lg mb-4"
            src="img/pafg338d.png"
            alt="Product 1"
          />

          <h3 class="text-sm font-semibold mb-3">
            {{ Str::limit('Kabel Data Fast Charging 120W Micro Usb Type C Apel
            Lightning', 59) }}
          </h3>

          <p class="text-gray-700">$19.99</p>
        </div>
      </a>

      <a href="#">
        <div
          class="bg-white p-4 rounded-xl shadow-md hover:border-red-500 hover:border-2"
        >
          <img
            class="w-full h-auto rounded-lg mb-4"
            src="img/hrs53wqe.png"
            alt="Product 1"
          />

          <h3 class="text-sm font-semibold mb-3">
            {{ Str::limit('Kabel Data Fast Charging 120W Micro Usb Type C Apel
            Lightning', 59) }}
          </h3>
          <p class="text-gray-700">$19.99</p>
        </div>
      </a>

      <a href="#">
        <div
          class="bg-white p-4 rounded-xl shadow-md hover:border-red-500 hover:border-2"
        >
          <img
            class="w-full h-auto rounded-lg mb-4"
            src="img/pafg338d.png"
            alt="Product 1"
          />

          <h3 class="text-sm font-semibold mb-3">
            {{ Str::limit('Kabel Data Fast Charging 120W Micro Usb Type C Apel
            Lightning', 59) }}
          </h3>

          <p class="text-gray-700">$19.99</p>
        </div>
      </a>

      <a href="#">
        <div
          class="bg-white p-4 rounded-xl shadow-md hover:border-red-500 hover:border-2"
        >
          <img
            class="w-full h-auto rounded-lg mb-4"
            src="img/hrs53wqe.png"
            alt="Product 1"
          />

          <h3 class="text-sm font-semibold mb-3">
            {{ Str::limit('Kabel Data Fast Charging 120W Micro Usb Type C Apel
            Lightning', 59) }}
          </h3>
          <p class="text-gray-700">$19.99</p>
        </div>
      </a>

      <a href="#">
        <div
          class="bg-white p-4 rounded-xl shadow-md hover:border-red-500 hover:border-2"
        >
          <img
            class="w-full h-auto rounded-lg mb-4"
            src="img/pafg338d.png"
            alt="Product 1"
          />

          <h3 class="text-sm font-semibold mb-3">
            {{ Str::limit('Kabel Data Fast Charging 120W Micro Usb Type C Apel
            Lightning', 59) }}
          </h3>

          <p class="text-gray-700">$19.99</p>
        </div>
      </a>

      <a href="#">
        <div
          class="bg-white p-4 rounded-xl shadow-md hover:border-red-500 hover:border-2"
        >
          <img
            class="w-full h-auto rounded-lg mb-4"
            src="img/hrs53wqe.png"
            alt="Product 1"
          />

          <h3 class="text-sm font-semibold mb-3">
            {{ Str::limit('Kabel Data Fast Charging 120W Micro Usb Type C Apel
            Lightning', 59) }}
          </h3>
          <p class="text-gray-700">$19.99</p>
        </div>
      </a>
    </div>
  </div>
</section>