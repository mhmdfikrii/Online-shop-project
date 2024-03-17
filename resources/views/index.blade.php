@extends('layouts.main')

{{-- Promo --}}
<section class="mt-7 sm:mt-16 md:mt-20" id="promo">
  <div id="default-carousel" class="relative w-full container mx-auto" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
      @foreach ($content as $contents)
      <!-- Items -->
      <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <a href="#">
        <img src="{{ asset('storage/' . $contents->image_promo) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
          alt="..." />
          </a>
      </div>
      @endforeach
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
      @foreach ($content as $contents)
      <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide {{ $loop->iteration }}"
        data-carousel-slide-to="{{ $loop->index }}"></button>
        @endforeach
    </div>
    <!-- Slider controls -->
    <button type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                <span class="hidden">Previous</span>
            </span>
        </button>
        <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                <span class="hidden">Next</span>
            </span>
        </button>
  </div>
</section>


{{-- Product --}}
<section class="mb-10" id="product">
  <div class="container mx-auto">
    <div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
      <button type="button"
        class="text-gray-900 hover:text-white bg-gray-200 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3">
        All categories
      </button>
      <button type="button"
        class="text-gray-900 hover:text-white bg-gray-200 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3">
        Shoes
      </button>
      <button type="button"
        class="text-gray-900 hover:text-white bg-gray-200 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3">
        Bags
      </button>
      <button type="button"
        class="text-gray-900 hover:text-white bg-gray-200 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3">
        Electronics
      </button>
      <button type="button"
        class="text-gray-900 hover:text-white bg-gray-200 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3">
        Gaming
      </button>
    </div>
    
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
      @foreach ($product as $products)
      <a href="#">
        <div class="bg-white p-4 rounded-xl shadow-md hover:border-red-500 hover:border-2">          
          <img class="w-full h-52 rounded-lg mb-4" src="{{ asset('storage/' . $products->image1) }}" alt="Product 1" />
          <h3 class="text-sm font-semibold mb-3">
            {{ Str::limit($products->title, 59) }}
          </h3>
          <p class="text-gray-700">Rp. {{ number_format($products->harga, 0, ',', '.') }}</p>
        </div>
      </a>
      @endforeach
    </div>
    
  </div>
</section>