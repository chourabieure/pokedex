<template>
	<div class="d-flex justify-content-center text-left">
		<ul class="poke_list">
			<li type="button" ref="listElement" v-for="pokemon in myPokemons" @click="getPokemon(pokemon.id)">

				<span v-if="pokemon.id" class="d-flex justify-content-between">
					<img :src="'images/sprite/animated/'+pokemon.id+'.gif'" alt="image_pokemon" height='20px'> <span class="pl-2">{{ pokemon.nom_pok }}</span>
				</span>
				<span v-else >-Empty-</span>

			</li>
		</ul>

		<ul class="poke_info d-flex align-items-center" v-if="Object.keys(pokemon_info).length != 0">
			<pokemon-comp v-bind:pokemon_info="pokemon_info"></pokemon-comp>
		</ul>
        <ul class="poke_info d-flex align-items-center" v-else>
			<h3 class="p-0">Click on a pokemon to show details</h3>
		</ul>
	</div>
</template>


<script>
export default {
	props: ["myPokemons"],
	data() {
		return {
            pokemon_info: {},
		};
	},
	mounted() {
    },
	methods: {
		getPokemon(id) {   

			if (id != 0) {
				axios
					.get("pokemons/" + id)
					.then((response) => (this.pokemon_info = response.data))
					.catch((error) => console.log(error));
			}
		},
	},
};
</script>