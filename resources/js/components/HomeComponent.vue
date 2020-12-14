<template>
  <div class="container">
    <h5 class="text-center py-5">HOME</h5>
    <div class="d-flex justify-content-around">
      <router-link to="/pokedex">Pokedex</router-link>
      <router-link to="/myTeam">My team</router-link>
      <router-link to="/">Capture</router-link>
      <router-link to="/trades">Trades</router-link>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return {
      message:''
    }
  },
  mounted() {
    // console.log('Component mounted.')
  },
};
</script>
