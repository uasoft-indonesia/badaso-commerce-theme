<template>
  <div class="min-w-full flex justify-center">
    <section class="flex justify-between px-10 py-3 text-gray-400">
      <ul class="flex items-center">
        <li class="pr-6">
          <a href="#" @click.prevent="changePage(prevPage)">
            <div class="flex items-center justify-center hover:bg-gray-200 rounded-md transform h-8 w-8">
              <div class="transform">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
              </div>
            </div>
          </a>
        </li>
        <li class="pr-6" v-if="hasFirst()">
          <a href="#" @click.prevent="changePage(1)">
            <div class="flex hover:bg-gray-200 rounded-md transform h-8 w-8 items-center justify-center">
              <span class="transform">
                1
              </span>
            </div>
          </a>
        </li>
        <li class="pr-6" v-if="hasFirst()">...</li>
        <li class="pr-6" v-for="(page, index) in pages" :key="index">
          <a href="#" @click.prevent="changePage(page)">
            <div :class="['flex rounded-md transform h-8 w-8 items-center justify-center', value == page ? 'bg-primary text-white' : 'hover:bg-gray-200']">
              <span class="transform">{{ page }}</span>
            </div>
          </a>
        </li>
        <li class="pr-6" v-if="hasLast()">...</li>
        <li class="pr-6" v-if="hasLast()">
          <a href="#" @click.prevent="changePage(totalPages)">
            <div class="flex hover:bg-gray-200 rounded-md transform h-8 w-8 items-center justify-center">
              <span class="transform">
                {{ totalPages }}
              </span>
            </div>
          </a>
        </li>
        <li class="pr-6">
          <a href="#" @click.prevent="changePage(nextPage)">
            <div class="flex items-center justify-center hover:bg-gray-200 rounded-md transform h-8 w-8">
              <div class="transform">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
              </div>
            </div>
          </a>
        </li>
      </ul>
    </section>
  </div>
</template>

<script>
export default {
  name: 'Pagination',
  props: {
    value: {
      type: Number,
      default: 1
    },
    total: {
      type: Number,
      default: 0
    },
    perPage: {
      type: Number,
      default: 9
    },
    pageRange: {
      type: Number,
      default: 2
    },
  },
  data() {
    return {
      input: '',
    }
  },
  methods: {
    hasFirst: function () {
      return this.rangeStart !== 1
    },
    hasLast: function () {
      return this.rangeEnd < this.totalPages
    },
    hasPrev: function () {
      return this.value > 1
    },
    hasNext: function () {
      return this.value < this.totalPages
    },
    changePage: function (page) {
      if (page > 0 && page <= this.totalPages) {
        this.$emit('input', page)
      }
    }
  },
  computed: {
    pages: function () {
      var pages = []

      for (var i = this.rangeStart; i <= this.rangeEnd; i++) {
        pages.push(i)
      }

      return pages
    },
    rangeStart: function () {
      var start = this.value - this.pageRange

      return (start > 0) ? start : 1
    },
    rangeEnd: function () {
      var end = this.value + this.pageRange

      return (end < this.totalPages) ? end : this.totalPages
    },
    totalPages: function () {
      return Math.ceil(this.total / this.perPage)
    },
    nextPage: function () {
      return this.value + 1
    },
    prevPage: function () {
      return this.value - 1
    }
  }
}
</script>
