<template>
    <div class="flex justify-center">
    <div class="bg-white w-2/3 p-5 my-10 rounded-lg shadow-lg">
      <div class="my-3 flex items-center justify-between ">

        <a href="/" class="bg-gray-600  ml-3 px-3 py-1 items-center flex justify-between rounded-full">
          <svg class="fill-current text-white inline-block h-5 mr-2 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M7.05 9.293L6.343 10 12 15.657l1.414-1.414L9.172 10l4.242-4.243L12 4.343z"/>
          </svg>

          <p class="text-white ">back</p>
        </a>        

        <h3 class="text-gray-600 mx-3 font-bold text-xl">Categories</h3>
        <div class="mr-3 bg-green-400 py-1 px-3 rounded-full">
          <a href="/categories/create/" class="flex items-center justify-between">
            <svg class="fill-current text-white inline-block h-5 mr-2 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <path d="M11 9h4v2h-4v4H9v-4H5V9h4V5h2v4zm-1 11a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16z"/>
            </svg>
            <p class="text-white ">add</p>
          </a>
        </div>
      </div>
      <div class="border border-indigo-300 mx-4 my-3"></div>
      <div class="flex justify-center flex-wrap">
        <div v-for="item in items" :key="item.id" class=" flex justify-center my-3 py-10 w-56 mx-5 text-center bg-teal-500 rounded-lg">
          <div class="">
            <img class="rounded-full border-2 bg-cover my-3 h-48 w-48 border-teal-700" :src="'http://localhost:8080/storage/' + item.image" alt="">
            <a class="text-white font-bold text-xl" :href="'categories/' + item.id">{{item.name}}</a>
          </div>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
export default {
  props:{
    items :Array
  }

}
</script>

<style>

</style>
