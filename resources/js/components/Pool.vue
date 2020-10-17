<template>
  <div class="flex justify-center bg-blue-500 ">
    <div class="w-2/3 bg-white rounded-lg my-10 p-3">
      <h3 class="font-mono py-2 text-center font-bold">Which photo do you think is better?</h3>
      <div class="text-center my-5 bg-pink-300 rounded-lg">
       <div class="flex justify-center flex-wrap" v-show="!this.isendPoll">

        <div class=" flex justify-center my-3 py-10 w-56 mx-10 text-center bg-teal-500 rounded-lg animate-pulse  shadow-lg hover:animate-bounce" @click="card_A_win">
          <div class="">
            <img class="rounded-full border-2 bg-cover my-3 h-48 w-48 border-teal-700" :src="'http://localhost:8080/storage/' + card1.image" alt="">
            <a class="text-white font-bold text-xl">{{card1.name}}</a>
            <!-- <a class="text-white font-bold text-xl" :href="'categories/' + card1.id">{{card1.image}}</a> -->
          </div>
        </div>

        <div class=" flex justify-center my-3 py-10 w-56 mx-10 text-center bg-teal-500 rounded-lg animate-pulse shadow-lg hover:animate-bounce" @click="card_B_win">
          <div class="">
            <img class="rounded-full border-2 bg-cover my-3 h-48 w-48 border-teal-700" :src="'http://localhost:8080/storage/' + card2.image" alt="">
            <a class="text-white font-bold text-xl" >{{card2.name}}</a>
            <!-- <a class="text-white font-bold text-xl" :href="'categories/' + card1.id">{{card1.image}}</a> -->
          </div>
        </div>
        
       </div>

       <div v-show="this.isendPoll">pool is ended</div>
      </div>
    </div>
  
  </div>
</template>

<script>
import Card from '../model/Card';

export default {
  name:'Pool',
  props:{
    cards: Array
  },
  data() {
    return{
      card1: Object,
      card2:Object,
      response:Object,
      endPoll:false,
      E1:Number,
      E2:Number
    }
  },
  methods:{
    startPool() {
      this.card2 = this.cards.pop()
      this.card1= this.cards.pop()
      this.resolveE()
    },

    haveCards() {
      return this.cards.length > 0
    },

    resolveE() {
      this.E1 =1/(1+Math.pow(10,(this.card2.score - this.card1.score)/400))
      this.E2 =1/(1+Math.pow(10,(this.card1.score - this.card2.score)/400))
      console.log('E1 is'+this.E1)
      console.log('E2 is'+this.E2)
    },

    card_A_win() {
      let scoreA = this.card1.score + 24*(1 - this.E1)
      let scoreB = this.card2.score + 24*(0 - this.E2)

      this.card1.score =scoreA
      this.card2.score =scoreB

      this.updateScoreCards();

      if(this.haveCards()){
        this.card2 = this.cards.pop()
        // console.log(this.card2)
        this.resolveE()
      }else{
        this.endPoll =true
        console.log(this.endPoll)
      }

    },

    card_B_win() {
      let scoreA = this.card1.score + 24*(0-this.E1)
      let scoreB = this.card2.score + 24*(1-this.E2)

      this.card1.score =scoreA
      this.card2.score =scoreB

      this.updateScoreCards();

      if(this.haveCards()){
        this.card1 = this.cards.pop()
        this.resolveE()
      }else{
        this.endPoll =true
      }
    },

    updateScoreCards(){
      const card = new Card();

      card.updateScore(this.card1).then(response => {
        this.response = response.data;
      })

      card.updateScore(this.card2).then(response => {
        this.response = response.data;
      })
    }

  },

  computed:{
    isendPoll(){
      return this.endPoll;
    }
  },

  created(){
    this.startPool();
  }
}
</script>

<style>

</style>
