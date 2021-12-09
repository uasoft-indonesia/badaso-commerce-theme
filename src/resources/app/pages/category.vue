<template>
  <div>
    <Head :title="$page.props.name" />

    <div class="container pt-8 hidden sm:block">
      <carousel-single autoplay class="h-80 rounded-sm">
        <carousel-item-single>
          <img src="https://cf.shopee.co.id/file/c8674787746f009d717b946abe9c431e" alt="">
        </carousel-item-single>
        <carousel-item-single>
          <img src="https://cf.shopee.co.id/file/dbecfb8fd8e0576fb483dc8dee70f760" alt="">
        </carousel-item-single>
      </carousel-single>
      <div class="h-4 sm:h-5" />
      <div class="grid grid-cols-6 gap-4 w-full h-full">
        <!-- Filter -->
        <div class="col-start-1 row-span-full flex flex-wrap gap-6 mb-auto">
          <div class="flex gap-2 items-center pt-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
            </svg>
            <span class="font-semibold">Semua Kategori</span>
          </div>
          <div class="w-full h-px bg-gray-300" />
          <div class="flex flex-wrap gap-3">
            <Link v-if="activeCategory" :href="route('badaso.commerce-theme.category', $page.props.slug)" class="text-primary w-full font-bold text-sm flex items-center px-2 relative">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 absolute -left-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
              </svg>
              {{ activeCategory.name }}
            </Link>
            <Link :href="route('badaso.commerce-theme.category', category.slug)" v-for="category, index in filteredCategories" :key="index" class="text-gray-500 w-full font-medium text-sm flex items-center px-2 relative">
              {{ category.name }}
            </Link>
          </div>
          <div class="flex w-full gap-2 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
            </svg>
            <span class="font-semibold">Filter</span>
          </div>
          <div class="w-full h-px bg-gray-300" />
          <div class="flex w-full flex-wrap gap-3">
            <div href="#" class="text-gray-600 w-full font-semibold text-sm flex items-center relative">
              Batas Harga
            </div>
            <div class="flex items-center gap-2 w-full max-w-full">
              <input type="text" placeholder="RP MIN" v-model="minPrice" class="ring-1 w-full ring-gray-300 text-xs rounded-sm focus:outline-none p-2">
              <div class="h-px w-16 bg-gray-300" />
              <input type="text" placeholder="RP MAX" v-model="maxPrice" class="ring-1 w-full ring-gray-300 text-xs rounded-sm focus:outline-none p-2">
            </div>
            <button class="w-full bg-primary text-white p-1 text-sm uppercase rounded-sm" @click="filterProductsPrice">
              Terapkan
            </button>
          </div>
          <div class="w-full h-px bg-gray-300" />
          <div class="flex w-full flex-wrap gap-3 select-none cursor-default">
            <div class="text-gray-600 w-full font-semibold text-sm flex items-center relative">
              Penilaian
            </div>
            <div class="flex gap-2 flex-wrap">

              <div class="w-auto flex gap-1 items-center cursor-pointer" @click="() => filterProductsPriceByRating(5)">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
              </div>

              <div class="w-auto flex gap-1 items-center cursor-pointer" @click="() => filterProductsPriceByRating(4)">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" stroke="currentColor" fill="transparent">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <span class="text-sm">ke atas</span>
              </div>

              <div class="w-auto flex gap-1 items-center cursor-pointer" @click="() => filterProductsPriceByRating(3)">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" stroke="currentColor" fill="transparent">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" stroke="currentColor" fill="transparent">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <span class="text-sm">ke atas</span>
              </div>

              <div class="w-auto flex gap-1 items-center cursor-pointer" @click="() => filterProductsPriceByRating(2)">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" stroke="currentColor" fill="transparent">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" stroke="currentColor" fill="transparent">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" stroke="currentColor" fill="transparent">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <span class="text-sm">ke atas</span>
              </div>

              <div class="w-auto flex gap-1 items-center cursor-pointer" @click="() => filterProductsPriceByRating(1)">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" stroke="currentColor" fill="transparent">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" stroke="currentColor" fill="transparent">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" stroke="currentColor" fill="transparent">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" stroke="currentColor" fill="transparent">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <span class="text-sm">ke atas</span>
              </div>
            </div>
          </div>
          <div class="w-full h-px bg-gray-300" />
          <button class="w-full bg-primary text-white uppercase text-sm p-1 rounded-sm" @click="resetProducts">
            Hapus Semua
          </button>
        </div>
        <!-- Sorting -->
        <div class="col-start-2 col-end-7 flex flex-wrap items-start h-max">
          <div class="flex bg-gray-200 h-12 items-center px-4 gap-4 rounded-xl w-full">
            <div class="text-gray-500 text-sm">Urutkan</div>
            <button class="w-24 h-8 bg-primary text-white rounded-md text-sm">Terbaru</button>
            <button class="w-24 h-8 bg-white hover:bg-gray-100 text-gray-600 rounded-md text-sm">
              Terlaris
            </button>
            <button class="w-48 h-8 bg-white text-gray-600 rounded-md text-sm flex items-center justify-between px-3">
              <span>Harga</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </button>
            <div class="flex-grow" />
            <div class="text-sm">
              <span class="text-primary">{{ products.currentPage }}</span>/{{ products.lastPage }}
            </div>
            <div class="flex">
              <button disabled class="px-2 h-8 bg-white disabled:opacity-30 disabled:cursor-default text-gray-600 rounded-l-md text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
              </button>
              <div class="h-full w-px bg-gray-500"></div>
              <button class="px-2 h-8 bg-white hover:bg-gray-100 text-gray-600 rounded-r-md text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
              </button>
            </div>
          </div>
          <!-- Items -->
          <div class="w-full py-2 grid grid-cols-5 h-full gap-2">
            <template v-if="products.data.length > 0">
              <commerce-product-alt :product="product" v-for="product, index in products.data" :key="index" />
            </template>
          </div>
        </div>
        <div class="h-4 sm:h-5" />
    
        <div class="col-start-2 col-end-7">
          <!-- Pagination -->
          <pagination :total="products.total" :per-page="productLimit" v-model="currentPage" />
        </div>
      </div>
    </div>

    <div class="sm:hidden relative">
      <transition
        enter-active-class="transition-all duration-75 ease transform"
        leave-active-class="transition-all duration-75 ease transform"
        enter-class="opacity-50"
        leave-to-class="opacity-50"
        leave-class="opacity-100"
        enter-to-class="opacity-100"
      >
        <div class="fixed z-80 h-screen inset-0 w-full h-full bg-black bg-opacity-50" v-if="filter" @click="closeFilter">
        </div>
      </transition>

      <transition
        enter-active-class="transition-all duration-300 ease transform"
        leave-active-class="transition-all duration-300 ease transform"
        enter-class="translate-x-full"
        leave-to-class="translate-x-full"
        leave-class="translate-x-0"
        enter-to-class="translate-x-0"
      >
        <div class="fixed z-100 h-screen left-16 right-0 top-0 bottom-0 bg-white" v-if="filter">
          <div class="w-full flex flex-col h-full">
            <div class="p-3 bg-gray-100 w-full">Filter</div>

            <div class="p-2 flex justify-end gap-3 absolute bottom-0 w-full border-t">
              <div class="p-2 text-sm rounded-md text-primary bg-transparent border border-primary">Atur Ulang</div>
              <div class="p-2 text-sm rounded-md bg-primary text-white" @click="applyFilter">Terapkan</div>
            </div>

            <div class="p-3 w-full flex flex-col gap-2">
              <div class="text-sm">Batas Harga (Rp)</div>
              <div class="p-2 bg-gray-100 flex gap-1 items-center">
                <input type="text" placeholder="MIN" v-model="minPrice" class="ring-1 w-full ring-gray-300 text-xs rounded-sm focus:outline-none p-2">
                <div class="h-px w-6 bg-gray-300" />
                <input type="text" placeholder="MAX" v-model="maxPrice" class="ring-1 w-full ring-gray-300 text-xs rounded-sm focus:outline-none p-2">
              </div>
            </div>

            <div class="p-3 w-full flex flex-col gap-2">
              <div class="text-sm">Penilaian</div>
              <div class="grid grid-cols-2 gap-2 w-full items-center justify-center">
                <div @click="rating = 5" :class="[rating === 5 ? 'border border-primary' : '']" class="bg-gray-100 p-2 text-xs flex justify-center rounded-md text-center">Bintang 5</div>
                <div @click="rating = 4" :class="[rating === 4 ? 'border border-primary' : '']" class="bg-gray-100 p-2 text-xs flex justify-center rounded-md text-center">Bintang 4 ke atas</div>
                <div @click="rating = 3" :class="[rating === 3 ? 'border border-primary' : '']" class="bg-gray-100 p-2 text-xs flex justify-center rounded-md text-center">Bintang 3 ke atas</div>
                <div @click="rating = 2" :class="[rating === 2 ? 'border border-primary' : '']" class="bg-gray-100 p-2 text-xs flex justify-center rounded-md text-center">Bintang 2 ke atas</div>
                <div @click="rating = 1" :class="[rating === 1 ? 'border border-primary' : '']" class="bg-gray-100 p-2 text-xs flex justify-center rounded-md text-center">Bintang 1 ke atas</div>
              </div>
            </div>
          </div>
        </div>
      </transition>
    </div>

    <div class="flex flex-col w-full sm:hidden">

      <nav class="block px-4 top-2 select-none bg-white w-full py-3">
        <div class="h-10 w-full relative flex items-center gap-3">
          <div class="text-primary flex flex-row items-end" @click="goBack">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
          </div>
          <div class="relative flex items-center h-10">
            <div class="absolute left-2 text-primary">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </div>
            <input
              type="text"
              v-model="search"
              @keypress.enter="searchProduct"
              class="block w-full h-full focus:outline-none pr-3 pl-9 py-4 rounded-sm bg-gray-100 text-sm"
              placeholder="Search anything here"
            />
          </div>
          <div class="text-primary flex flex-row items-end" @click="openFilter">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
            </svg>
            <span class="text-primary text-xs">Filter</span>
          </div>
        </div>
      </nav>

      <commerce-mobile-main-banner />

      <card class="sm:hidden block mt-3" :gap="0">
        <div class="text-gray-400 bg-white pl-2 pt-2">KATEGORI</div>
        <card-body color="white" no-gutter :radius="0" class="overflow-x-scroll hide-scrollbar pb-4">
          <div class="inline-flex items-start justify-start h-full flex-row gap-x-2 mx-2">
            <div v-for="category, index in splitCategory" :key="index" class="w-24 flex-1">
              <Link v-if="category[0]" :href="route('badaso.commerce-theme.category', category[0].slug)" class="h-full w-24 rounded-xl flex flex-wrap">
                <img :src="category[0].image" alt="" class="rounded-full object-contain object-center w-24 h-24">
                <div class="text-center text-sm h-10 w-full line-clamp-2">{{ category[0].name }}</div>
              </Link>
              <Link v-if="category[1]" :href="route('badaso.commerce-theme.category', category[1].slug)" class="h-full w-24 rounded-xl flex flex-wrap mt-2">
                <img :src="category[1].image" alt="" class="rounded-full object-contain object-center w-24 h-24">
                <div class="text-center text-sm h-10 w-full line-clamp-2">{{ category[1].name }}</div>
              </Link>
            </div>
          </div>
        </card-body>
      </card>

      <card class="sm:hidden block mt-3" :gap="0">
        <card-body color="transparent" no-gutter :radius="0">
          <div class="w-full grid grid-cols-2 px-2 gap-2">
            <commerce-mobile-product :product="product" v-for="product, index in products.data" :key="index" />
          </div>
        </card-body>
      </card>

      <!-- <pagination :total="products.total" :per-page="productLimit" v-model="currentPage" /> -->
    </div>
  </div>
</template>

<script>
import CommerceMobileMainBanner from './../components/commerce-mobile-main-banner.vue'
import CarouselSingle from './../components/carousel-single/carousel.vue'
import CarouselItemSingle from './../components/carousel-single/carousel-item.vue'
import Pagination from './../components/pagination/pagination.vue'
import CommerceProductAlt from '../components/commerce-product-alt.vue'
import CommerceMobileProduct from '../components/commerce-mobile-product.vue'
import Card from '../components/card/card.vue'
import CardHeader from '../components/card/card-header.vue'
import CardAction from '../components/card/card-action.vue'
import CardBody from '../components/card/card-body.vue'
import Carousel from '../components/carousel/carousel.vue'
import CarouselItem from '../components/carousel/carousel-item.vue'
import CommerceLogo from "../components/commerce-logo.vue";
import CommerceSearchInput from "../components/commerce-search-input.vue";

import { mapState } from 'vuex'
import { Link, Head } from '@inertiajs/inertia-vue'
import appLayout from '../layouts/app.vue'
import categoryLayout from '../layouts/category.vue'
export default {
  layout: [appLayout, categoryLayout],
  components: {
    CommerceMobileMainBanner,
    CarouselSingle,
    CarouselItemSingle,
    Pagination,
    CommerceProductAlt,
    CommerceMobileProduct,
    Link,
    Head,
    Card,
    CardHeader,
    CardAction,
    CardBody,
    Carousel,
    CarouselItem,
    CommerceLogo,
    CommerceSearchInput,
  },
  inject: ["goBack"],
  data() {
    return {
      currentPage: 1,
      products: {
        data: []
      },
      productCategories: [],
      minPrice: 0,
      maxPrice: 0,
      search: '',
      filter: false,
      rating: 0,
    }
  },
  computed: {
    splitCategory() {
      return this.$_.chunk(this.productCategories, 2)
    },
    activeCategory() {
      return this.$_.find(this.productCategories, { slug: this.$page.props.slug })
    },
    filteredCategories() {
      return this.$_.filter(this.productCategories, (o) => {
        return o.slug !== this.$page.props.slug
      })
    },
    ...mapState({
      productLimit(state) {
        return parseInt(this.$_.find(state.moduleConfigurations, { key: "homeProductLimit" }).value);
      },
    })
  },
  watch: {
    currentPage: {
      handler(val) {
        this.getProducts()
      }
    }
  },
  beforeRouteEnter(to, from, next) {
    next(vm => {
      document.title = `${vm.$voca.titleCase(vm.$page.props.slug, true)} Category - Badaso Commerce Theme`
    })
  },
  mounted() {
    this.search = this.$page.props.search;
    this.getProducts()
    this.getCategories()
  },
  methods: {
    openFilter() {
      this.filter = true;
    },
    closeFilter() {
      this.filter = false;
    },
    searchProduct() {
      if (this.search) {
        this.$inertia.visit(this.route('badaso.commerce-theme.search', this.search))
      }
    },
    setMinPrice() {
      if (this.products.data.length === 0) return 0
      let prices = []
      this.products.data.forEach(product => {
        product.productDetails.forEach(detail => {
          prices.push(detail.price)
        })
      })

      this.minPrice = Math.min(...prices)
    },
    setMaxPrice() {
      if (this.products.data.length === 0) return 0
      let prices = []
      this.products.data.forEach(product => {
        product.productDetails.forEach(detail => {
          prices.push(detail.price)
        })
      })

      this.maxPrice = Math.max(...prices)
    },
    getCategories() {
      this.$api.badasoProductCategory
        .browse()
        .then(res => {
          this.productCategories = res.data.productCategories
        })
        .catch(err => {
          console.error(err);
        })
    },
    filterProductsPrice() {
      this.products = {
        data: []
      }
      this.$api.badasoProduct
        .browseByCategorySlug({
          slug: this.$page.props.slug,
          page: this.currentPage,
          min: this.minPrice,
          max: this.maxPrice,
        })
        .then(res => {
          this.products = res.data.products
        })
        .catch(err => {
          console.error(err);
        })
    },
    filterProductsPriceByRating(rating) {
      this.products = {
        data: []
      }
      this.$api.badasoProduct
        .browseByCategorySlug({
          slug: this.$page.props.slug,
          page: this.currentPage,
          min: this.minPrice,
          max: this.maxPrice,
          rating
        })
        .then(res => {
          this.products = res.data.products
        })
        .catch(err => {
          console.error(err);
        })
    },
    resetProducts() {
      this.products = {
        data: []
      }
      this.getProducts()
    },
    getProducts() {
      this.$api.badasoProduct
        .browseByCategorySlug({
          slug: this.$page.props.slug,
          page: this.currentPage,
        })
        .then(res => {
          this.products = res.data.products
          this.setMaxPrice();
          this.setMinPrice();
        })
        .catch(err => {
          console.error(err);
        })
    },
    applyFilter() {
      this.products = {
        data: []
      }

      let params = {
        slug: this.$page.props.slug,
        page: this.currentPage,
        min: this.minPrice,
        max: this.maxPrice,
      }

      if (this.rating > 0) {
        params = { ...params, rating: this.rating }
      }

      this.$api.badasoProduct
        .browseByCategorySlug(params)
        .then(res => {
          this.products = res.data.products
        })
        .catch(err => {
          console.error(err);
        })
        .finally(() => {
          this.closeFilter()
        })
    },
    resetFilter() {
      this.products = {
        data: []
      }

      this.$api.badasoProduct
        .browseByCategorySlug({
          slug: this.$page.props.slug,
          page: this.currentPage,
        })
        .then(res => {
          this.products = res.data.products
          this.setMaxPrice();
          this.setMinPrice();
        })
        .catch(err => {
          console.error(err);
        })
        .finally(() => {
          this.closeFilter()
        })
    }
  }
}
</script>