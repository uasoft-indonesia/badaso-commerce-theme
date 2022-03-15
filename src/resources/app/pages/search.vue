<template>
  <div>
    <Head :title="$page.props.name" />

    <div class="container pt-8 hidden md:block">
      <div class="grid grid-cols-6 gap-4 w-full h-full">

        <!-- Filter -->
        <div class="col-start-1 row-span-full flex flex-wrap gap-6 mb-auto">

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
          </div>
          <div class="w-full h-px bg-gray-300" />
          <div class="flex w-full flex-wrap gap-3 select-none cursor-default">
            <div class="text-gray-600 w-full font-semibold text-sm flex items-center relative">
              Penilaian
            </div>
            <div class="flex gap-2 flex-wrap">

              <div class="w-full flex gap-1 items-center cursor-pointer p-1 px-1.5" :class="[rating === 5 ? 'bg-gray-200 rounded-full font-bold' : '']" @click="setRatingOption(5)">
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

              <div class="w-full flex gap-1 items-center cursor-pointer p-1 px-1.5" :class="[rating === 4 ? 'bg-gray-200 rounded-full font-bold' : '']" @click="setRatingOption(4)">
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

              <div class="w-full flex gap-1 items-center cursor-pointer p-1 px-1.5" :class="[rating === 3 ? 'bg-gray-200 rounded-full font-bold' : '']" @click="setRatingOption(3)">
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

              <div class="w-full flex gap-1 items-center cursor-pointer p-1 px-1.5" :class="[rating === 2 ? 'bg-gray-200 rounded-full font-bold' : '']" @click="setRatingOption(2)">
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

              <div class="w-full flex gap-1 items-center cursor-pointer p-1 px-1.5" :class="[rating === 1 ? 'bg-gray-200 rounded-full font-bold' : '']" @click="setRatingOption(1)">
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

          <div class="flex flex-col gap-3 w-full">
            <button class="w-full bg-primary text-white p-1 text-sm uppercase rounded-sm" @click="applyFilterQueryString">
              Terapkan
            </button>

            <button class="w-full bg-transparent text-primary border border-primary uppercase text-sm p-1 rounded-sm" @click="resetProducts">
              Hapus Semua
            </button>
          </div>
        </div>

        <!-- Sorting -->
        <div class="col-start-2 col-end-7 flex flex-wrap items-start h-max">
          <div class="flex mb-4 text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
            </svg>
            Hasil pencarian untuk&nbsp;<span class="text-primary font-medium">"{{ keyword }}"</span>
          </div>
          <div class="flex bg-gray-200 h-12 items-center px-4 gap-4 rounded-xl w-full">
            <div class="text-gray-500 text-sm">Urutkan</div>
            <button :class="[sort === 'latest' ? 'bg-primary text-white' : 'bg-white hover:bg-gray-100 text-gray-600']" class="h-8 px-6 rounded-md text-sm" @click="applyFilterSort('latest')">Terbaru</button>

            <button :class="[sort === 'most-selling' ? 'bg-primary text-white' : 'bg-white hover:bg-gray-100 text-gray-600']"  class="h-8 px-6 rounded-md text-sm" @click="applyFilterSort('most-selling')">Terlaris</button>

            <div class="relative md:max-w-52 max-w-32 w-full">
              <button class="w-full  h-8 bg-white text-gray-600 rounded-md text-sm flex items-center justify-between px-3" @click="priceFilter = !priceFilter" :class="[sort === 'price' ? 'text-primary' : '']">
                <span>Harga</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </button>

              <transition>
                <div v-if="priceFilter" class="w-full absolute left-0 right-0 -bottom-18 shadow rounded-md z-70 bg-white">
                  <div :class="[sort === 'price' && type === 'asc' ? 'text-primary' : '']" class="p-2 flex items-center justify-between text-sm hover:bg-black hover:bg-opacity-5 rounded-t-md cursor-pointer" @click="applyFilterSortPrice('asc')">
                    Harga: Rendah ke Tinggi
                    <template v-if="sort === 'price' && type === 'asc'">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                    </template>
                  </div>
                  <div :class="[sort === 'price' && type === 'desc' ? 'text-primary' : '']" class="p-2 flex items-center justify-between text-sm hover:bg-black hover:bg-opacity-5 rounded-b-md cursor-pointer" @click="applyFilterSortPrice('desc')">
                    Harga: Tinggi ke Rendah
                    <template v-if="sort === 'price' && type === 'desc'">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                    </template>
                  </div>
                </div>
              </transition>
            </div>

            <div class="flex-grow" />
            <div class="text-sm">
              <span class="text-primary">{{ products.currentPage }}</span>/{{ products.lastPage }}
            </div>
            <div class="flex">
              <button :disabled="currentPage <= 1" class="px-2 h-8 bg-white disabled:opacity-30 disabled:cursor-default text-gray-600 rounded-l-md text-sm" @click="currentPage -= 1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
              </button>
              <div class="h-full w-px bg-gray-500"></div>
              <button :disabled="currentPage >= products.lastPage" class="px-2 h-8 bg-white disabled:opacity-30 disabled:cursor-default text-gray-600 rounded-r-md text-sm" @click="currentPage += 1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
              </button>
            </div>
          </div>
          <!-- Items -->
          <div class="w-full py-2 grid md:grid-cols-3 lg:grid-cols-5 h-full gap-2">
            <template v-if="products.data.length > 0">
              <commerce-product-alt :product="product" v-for="product, index in sortedProducts" :key="index" />
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

    <div class="flex flex-col w-full sm:hidden">
      <card class="sm:hidden block mt-3" :gap="0">
        <card-body color="transparent" no-gutter :radius="0">
          <div class="w-full grid grid-cols-2 px-2 gap-2">
            <commerce-mobile-product :product="product" v-for="product, index in products.data" :key="index" />
          </div>
        </card-body>
      </card>

    </div>
  </div>
</template>

<script>
import CarouselSingle from './../components/carousel-single/carousel.vue'
import CarouselItemSingle from './../components/carousel-single/carousel-item.vue'
import Pagination from './../components/pagination/pagination.vue'
import CommerceProductAlt from '../components/commerce-product-alt.vue'
import CommerceMobileProduct from '../components/commerce-mobile-product.vue'
import Card from '../components/card/card.vue'
import CardHeader from '../components/card/card-header.vue'
import CardAction from '../components/card/card-action.vue'
import CardBody from '../components/card/card-body.vue'

import { mapState } from 'vuex'
import { Link, Head } from '@inertiajs/inertia-vue'
import appLayout from '../layouts/app.vue'
import categoryLayout from '../layouts/category.vue'
export default {
  layout: [appLayout, categoryLayout],
  components: {
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
  },
  inject: ["goBack"],
  data() {
    return {
      currentPage: 1,
      products: {
        data: []
      },
      minPrice: null,
      maxPrice: null,
      keyword: null,
      filter: false,
      rating: 0,
      sort: 'latest',
      type: 'desc',
      priceFilter: false
    }
  },
  computed: {
    sortedProducts() {
      return this.products.data.sort((a, b) => {
        if (this.sort === 'latest') {
          if (this.type === 'desc') {
            return this.$moment(a.createdAt).isBefore(b.createdAt) ? 1 : -1
          } else {
            return this.$moment(a.createdAt).isAfter(b.createdAt) ? 1 : -1
          }
        }

        if (this.sort === 'most-selling') {
          let aSold = a.productDetails.reduce((total, item) => {
            if (item.sold !== null) {
              return total + parseInt(item.sold)
            }
            return total;
          }, 0)

          let bSold = b.productDetails.reduce((total, item) => {
            if (item.sold !== null) {
              return total + parseInt(item.sold)
            }
            return total;
          }, 0)

          if (this.type === 'desc') {
            return bSold - aSold
          } else {
            return aSold - bSold
          }
        }

        if (this.sort === 'price') {

          if (this.type === 'desc') {
            // get a price from product details using Math.max
            let aPrice = Math.max(...a.productDetails.map(item => item.price))
            let bPrice = Math.max(...b.productDetails.map(item => item.price))
            return bPrice > aPrice ? 1 : -1
          } else {
            // get a price from product details using Math.min
            let aPrice = Math.min(...a.productDetails.map(item => item.price))
            let bPrice = Math.min(...b.productDetails.map(item => item.price))
            return bPrice < aPrice ? 1 : -1
          }
        }
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
        this.fetchSearchedProducts()
      }
    }
  },
  beforeRouteEnter(to, from, next) {
    next(vm => {
      document.title = `Pencarian ${vm.$voca.titleCase(vm.$page.props.keyword, true)} - Badaso Commerce Theme`
    })
  },
  mounted() {
    this.keyword = this.$page.props.keyword;
    this.fetchSearchedProducts()
    this.setQueryParams()
  },
  methods: {
    setQueryParams() {
      this.keyword = this.$page.props.keyword
      this.rating = this.$page.props.rating ? parseInt(this.$page.props.rating) : null
      this.minPrice = parseInt(this.$page.props.minPrice)
      this.maxPrice = parseInt(this.$page.props.maxPrice)
      this.sort = this.$page.props.sort || 'latest'
      this.type = this.$page.props.type || 'desc'
      this.page = this.$page.props.page
      this.slug = this.$page.props.slug
    },
    openFilter() {
      this.filter = true;
    },
    closeFilter() {
      this.filter = false;
    },
    fetchSearchedProducts() {
      this.$api.badasoProduct
        .search(this.queryParams())
        .then(res => {
          this.products = res.data.products;
          this.setMaxPrice();
          this.setMinPrice();
        })
        .catch(err => {
          console.error(err);
        })
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
    resetProducts() {
      this.products = {
        data: []
      }
      this.minPrice = 0;
      this.maxPrice = 0;
      this.rating = 0;
      this.currentPage = 1;
      this.applyFilterQueryString()
    },
    setRatingOption(rating) {
      if (this.rating === rating) {
        this.rating = 0
      } else {
        this.rating = rating
      }
    },
    queryParams() {
      let params = {
        sort: this.$page.props.sort || this.props || 'latest',
        rating: [0, 1, 2, 3, 4, 5].includes(this.rating) ? this.rating : (this.$page.props.rating || "0"),
        keyword: this.keyword || "",
        page: this.currentPage || 1,
        slug: this.$page.props.slug,
        type: this.type || "desc"
      }

      if (this.minPrice) {
        params.minPrice = this.minPrice
      }

      if (this.maxPrice) {
        params.maxPrice = this.maxPrice
      }

      return params
    },
    applyFilterSort(sort) {
      this.sort = sort;
      this.type = 'desc'
      this.$inertia.visit(this.route('badaso.commerce-theme.search', {
        ...this.queryParams(),
        sort
      }))
    },
    applyFilterSortPrice(type) {
      this.sort = 'price';
      this.type = 'type'
      this.$inertia.visit(this.route('badaso.commerce-theme.search', {
        ...this.queryParams(),
        sort: this.sort,
        type
      }))
    },
    applyFilterQueryString() {
      this.$inertia.visit(this.route('badaso.commerce-theme.search', this.queryParams()))
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
        .search(params)
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
        .search({
          keyword: this.keyword || this.$page.props.keyword,
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
