<template>

	<div class="container model myteam">
		<div class="title">
			<router-link to="/">
				<i class="py-5 fas fa-arrow-left"></i>
			</router-link>
			<h1 class="text-center py-5">My Team</h1>
		</div>

		<team-detail-comp v-bind:myPokemons="myPokemons"></team-detail-comp>
		
	</div>
</template>


<script>
export default {
	data() {
		return {
            myPokemons:{}
		};
	},
	mounted() {
		axios
			.get("users/me/team")
			.then((response) => {
				this.myPokemons = response.data;
			})
			.catch((error) => console.log(error));
	},
	methods: {
	},
};
</script>