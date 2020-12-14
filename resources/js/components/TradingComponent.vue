<template>
	<div class="container model trading">
		<!-- Button trigger modal -->

		<!-- Modal -->
		<div class="modal fade" id="modalSend" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Trade Confirmation</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Do you really want to send <strong>{{pokemon_info.nom_pok}} </strong> to <strong>{{username}}</strong>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
						<button type="button" class="btn btn-primary" @click="trade(pokemon_info.id)" data-dismiss="modal" data-toggle="modal" data-target="#modalResponse">Yes</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="modalResponse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" style="font-weight:bold;color:red; " v-if="error">
						{{error}}
					</div>
					<div class="modal-body" v-else>
						Trade Complete !
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<div class="title">
			<router-link to="/trades">
				<i class="py-5 fas fa-arrow-left"></i>
			</router-link>
			<h1 class="text-center py-5">Trading</h1>

		</div>

		<h1 class="text-center pb-5"><i class="fas fa-arrow-right"></i></h1>

		<div class="d-flex justify-content-center">

			<div class="d-flex justify-content-center text-right">
				<ul class="poke_list">
					<li type="button" ref="listElement" v-for="pokemon in myTeam" @click="getPokemon(pokemon.id)">
						<span v-if="pokemon.id" class="d-flex justify-content-between">
							<img :src="'images/sprite/animated/'+pokemon.id+'.gif'" alt="image_pokemon" height='20px'> <span class="pl-2">{{ pokemon.nom_pok }}</span>
						</span>
						<span v-else>-Empty-</span>
					</li>
				</ul>
			</div>

			<ul class="poke_info d-flex flex-column align-items-center justify-content-start px-3" v-if="Object.keys(pokemon_info).length != 0">
				<pokemon-comp v-bind:pokemon_info="pokemon_info"></pokemon-comp>

				<h3 type="button" class="mt-3 btn btn-success" v-if="mypok" data-toggle="modal" data-target="#modalSend">Send {{pokemon_info.nom_pok}} <i class="fas fa-arrow-right"></i></h3>
			</ul>
			<ul class="poke_info px-1 d-flex align-items-start" v-else>
				<h3 class="p-0 text-center">Click on a pokemon to show details</h3>
			</ul>

			<div class="d-flex justify-content-center text-left">
				<ul class="poke_list poke_list_right">
					<li type="button" ref="listElement" v-for="pokemon in hisTeam" @click="getPokemonHis(pokemon.id)">
						<span v-if="pokemon.id" class="d-flex justify-content-between">
							 <span class="pr-2">{{ pokemon.nom_pok }}</span> <img :src="'images/sprite/animated/'+pokemon.id+'.gif'" alt="image_pokemon" height='20px'>
						</span>
						<span v-else>-Empty-</span>
					</li>
				</ul>
			</div>
		</div>

	</div>
</template>

<script>
export default {
	props: ["id", "username"],
	data() {
		return {
			myTeam: {},
			hisTeam: {},
			pokemon_info: {},
			error: "",
			mypok: true,
		};
	},
	mounted() {
		if (this.id === undefined) {
			this.$router.push("/trades");
		}
		this.refresh();
	},
	methods: {
		getPokemon(id) {
			if (id != 0) {
				axios
					.get("pokemons/" + id)
					.then((response) => (this.pokemon_info = response.data))
					.catch((error) => console.log(error));
				this.mypok = true;
			}
		},
		getPokemonHis(id) {
			this.getPokemon(id);
			this.mypok = false;
		},
		trade(pok_id) {
			axios
				.post("/users/" + this.id + "/team", {
					pokemon_id: pok_id,
				})
				.then((response) => {
					if (response.data.error) {
						this.error = "His team is already full";
					} else {
						this.pokemon_info = {};
					}
					this.refresh();
				})
				.catch((error) => console.log(error));
		},
		refresh() {
			axios
				.get("users/" + this.id + "/team")
				.then((response) => {
					this.hisTeam = response.data;
				})
				.catch((error) => console.log(error));
			axios
				.get("users/me/team")
				.then((response) => {
					this.myTeam = response.data;
				})
				.catch((error) => console.log(error));
		},
	},
};
</script>
