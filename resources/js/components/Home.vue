<template>
  <div>
    <div class="bg-white sticky top-0 z-10 w-full py-3 xl:hidden">
      <div class="flex justify-center items-center">
        <div class="center">
          <vs-select placeholder="همه" v-model="category" >
            
            <vs-option label="همه" value="all" >
              همه
            </vs-option>

            <vs-option v-for="item in categories" :key="item.id" :label="item.name" :value="item.id" >
              {{item.name}}
            </vs-option>
          </vs-select>
        </div>

        <label class="mx-1 text-gray-600" for="">:دسته بندی</label>
      </div>
    </div>
    
    <div class="invisible bg-white xl:h-20 xl:visible sticky top-0 z-30 text-center">
      <div class="flex justify-end mx-5">
        <a v-show="category != 'all'" :href="'poling/'+category" class="bg-blue-500 text-white px-5 py-2 my-3 rounded-lg shadow-xl border hover:bg-white hover:text-blue-500 cursor-pointer hover:border-blue-500">رتبه بندی</a>
        <a v-if="auth" href="/dashboard" class="bg-blue-500 text-white px-5 py-2 my-3 rounded-lg shadow-xl border hover:bg-white hover:text-blue-500 cursor-pointer hover:border-blue-500">داشبورد</a>
        <a v-else href="/login" class="bg-blue-500 text-white px-5 py-2 my-3 rounded-lg shadow-xl border hover:bg-white hover:text-blue-500 cursor-pointer hover:border-blue-500">ورود</a>
      </div>
    </div>

    <div class="invisible h-10/12 overflow-y-scroll fixed rounded-lg py-10 bg-white shadow-2xl border-2 border-purple-600  m-6 xl:visible xl:block xl:w-1/3">
      <div class="flex-grow px-3">
        <h2 class="text-center text-gray-600 text-xl">دسته بندی ها</h2>
        <div class=" text-center py-3 px-3 rounded-lg hover:animate-pulse cursor-pointer hover:bg-teal-200 text-gray-700 my-4" :class="{'bg-teal-200' : category == 'all' , 'bg-white' : category != 'all'}"  @click="setCategory('all')">
            همه
        </div>
        <div class="" v-for="item in categories" :key="item.id"  @click="setCategory(item.id)" >
          <div class=" text-center py-3 px-3 rounded-lg cursor-pointer hover:animate-pulse hover:bg-teal-200 text-gray-700 my-4" :class="{'bg-teal-200' : category == item.id , 'bg-white' : category != item.id}">
            {{item.name}}
          </div>
        </div>
      </div>
    </div>


    <div class="flex justify-end ">

      <div class="w-full xl:w-2/3">
        <div v-for="(card,index) in filterCards" :key="index" class="flex justify-center shadow-xl  my-4 ">
          <a :href="'/cards/'+card.id" class="flex justify-between items-center bg-white h-32 rounded-lg w-11/12 hover:animate-pulse hover:bg-teal-200 ">
            <div class="relative block w-32 h-32 ">
              <img class="absolute rounded-lg inset-0 h-full w-full object-cover object-center" :src="'storage/'+card.image" alt="">
            </div>
            <div class="flex relative justify-evenly h-32 items-center w-full">
              <span class="absolute right-5 top-2 z-10 text-xl font-mono font-bold text-gray-500">#{{index+1}}</span>
              <h2 class="font-mono text-xl font-bold text-gray-600">{{card.name}}</h2>
              <span class="mr-6 text-xl text-blue-600 font-semibold">{{card.score}}</span>
            </div>
          </a>
        </div>
      </div>
    </div>


    <a v-show="category != 'all'" :href="'poling/'+category" class="xl:hidden">
      <div class=" sticky bottom-0  h-8 shadow-2xl text-center text-white bg-indigo-600 text-lg rounded-lg"> رتبه بندی</div>
    </a>
  </div>
</template>

<script>
import Card from '../model/Card';
import Categories from '../model/Categories';

export default {
  data(){
    return{
      cards:[''],
      categories:Array,
      cat:[1,2],
      category:'all'
    }
  },

  props:{
    auth:Boolean
  },

  methods:{
    getCards(){
      const card = new Card()
      card.getCards().then(response => {
        this.cards = response.data
      })
    },
    getCategories() {
      const category = new Categories()
      category.getCategories().then(response => {
        this.categories = response.data
      })
    },

    setCategory(item) {
      this.category =item
    }

  },

  computed:{
    
    filterCards(){
      if(this.category != 'all'){
        return this.cards.filter(item =>item.category_id == this.category);
      }
      return this.cards
    },

  },

  created(){
    this.getCards()
    this.getCategories()
  }

}
</script>

<style>

</style>
