<template>
	<div class="container model pokedex">
		<div class="title">
			<router-link to="/">
				<i class="py-5 fas fa-arrow-left"></i>
			</router-link>
			<h1 class="text-center py-5">Pokedex</h1>
		</div>

		<div class="d-flex justify-content-center search-bar">
			<input type="text" v-model="search" placeholder="Search for a pokemon" @keyup="getSearch">
			<div class="panel-footer" v-if="results.length">
				<ul class="list-group">
					<li type="button" class="list-group-item d-flex justify-content-between" v-for="result in results" :key="result.id" @click="selectPokemon(result.id)">
						<img :src="'images/sprite/animated/'+result.id+'.gif'" alt="image_pokemon" height='20px'> <span class="pl-2">{{ result.nom_pok }}</span>
						
						
					</li>
				</ul>
			</div>
		</div>

		<div class="d-flex justify-content-center">
			<ul class="poke_list">
				<li class="d-flex justify-content-between" type="button" v-for="pokemon in pokemons" :key="pokemon.id" @click="getPokemon(pokemon.id)">
					<img :src="'images/sprite/animated/'+pokemon.id+'.gif'" alt="image_pokemon" height='20px'> <span class="pl-2">{{ pokemon.nom_pok }}</span>
				</li>
			</ul>

			<ul class="poke_info d-flex align-items-center" v-if="Object.keys(pokemon_info).length != 0">
				<pokemon-comp v-bind:pokemon_info="pokemon_info"></pokemon-comp>
			</ul>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			pokemons: {},
			pokemon_info: {},
			search: "",
			results: {},
		};
	},
	mounted() {
		axios
			.get("pokemons")
			.then((response) => (this.pokemons = response.data))
			.catch((error) => console.log(error));
		this.getPokemon(1);
		$('li').css('color','red')
	},
	methods: {
		getPokemon(id) {
			axios
				.get("pokemons/" + id)
				.then((response) => (this.pokemon_info = response.data))
				.catch((error) => console.log(error));
		},
		getSearch() {
			if (this.search.length >= 2) {
				axios
					.get("pokemons/search/" + this.search)
					.then((response) => (this.results = response.data))
					.catch((error) => console.log(error));
			}else{
				this.results = {}
			}
		},
		selectPokemon(id){
			this.getPokemon(id)
			this.search = ""
			this.results = {}
		}
	},
};
</script>
