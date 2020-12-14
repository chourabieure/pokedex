require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
import Home from './components/HomeComponent.vue'
import Pokedex from './components/PokedexComponent.vue'
import Team from './components/TeamComponent.vue'
import Pokemon from './components/PokemonComponent.vue'
import Trades from './components/TradeComponent.vue'
import TeamDetails from './components/TeamDetailComponent.vue'
import Counter from './components/CounterComponent.vue'
import NewPokemon from './components/NewPokemonComponent.vue'
import Trading from './components/TradingComponent.vue'
import Avatar from './components/AvatarComponent.vue'

// Init
Vue.use(VueRouter);
Vue.component('pokemon-comp',Pokemon);
Vue.component('team-comp',Team);
Vue.component('team-detail-comp',TeamDetails);
Vue.component('counter-comp',Counter);
Vue.component('new-pokemon-comp',NewPokemon);
Vue.component('avatar-comp',Avatar);
const routes = [
    {
        path:'/',
        component:Home
    },
    {
        path:'/pokedex',
        component:Pokedex
    }, 
    {
        path:'/myTeam',
        component:Team
    },
    {
        path:'/trades',
        component:Trades
    },
    {
        path:'/trading',
        name:'trading',
        component:Trading,
        props:true
    },
]
const router = new VueRouter({
    routes,
    mode: 'history'
});

const app = new Vue({
    el: '#app',
    router: router
});
