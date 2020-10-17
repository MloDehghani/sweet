import vue from 'vue'
import Pool from './components/Pool.vue'
import Categories from './components/Categories.vue'

const app = new vue({
  el:"#front",
  components:{
    Pool,
    Categories
  }
})
