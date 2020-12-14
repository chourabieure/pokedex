<template>
				
	<div class="container model myteam">
		<div class="title">
			<router-link to="/">
				<i class="py-5 fas fa-arrow-left"></i>
			</router-link>
			<h1 class="text-center py-5">Trades</h1>
		</div>


		<div class="d-flex justify-content-center search-bar">
			<input type="text" v-model="search" placeholder="Search for a user to trade with" @keyup="getSearch">
			<div class="panel-footer" v-if="results.length">
				<ul class="list-group">
					<li type="button" class="list-group-item" v-for="result in results" :key="result.id" @click="selectUser(result.id)">
						{{ result.username }}
					</li>
				</ul>
			</div>
		</div>

        <div v-if="Object.keys(user).length != 0" class="text-center">
            <h3 class="text-center py-3">{{user.username}}'s team</h3>
			<team-detail-comp v-bind:myPokemons="myPokemons"></team-detail-comp>
            <router-link :to="{name: 'trading', params: { id:user.id,username:user.username } }" type="button" class="text-center btn btn-success m-auto" >Trade with <strong>{{user.username}}</strong></router-link>
        </div>
	</div>
</template>


<script>
export default {
	data() {
		return {
            search: '',
            results: {},
            user: {},
            myPokemons:{}
		};
	},
	mounted() {

	},
	methods: {
        getUser(id) {
			axios
				.get("users/" + id)
				.then((response) => (this.user = response.data))
				.catch((error) => console.log(error));
		},
        getSearch() {
			if (this.search.length >= 1) {
				axios
					.get("users/search/" + this.search)
					.then((response) => (this.results = response.data))
					.catch((error) => console.log(error));
			}else{
				this.results = {}
			}
        },
        selectUser(id){
			this.getUser(id)
			this.search = ""
            this.results = {}
            this.user_to_search = id
            this.getTeam(id)
        },
        getTeam(id){
            axios
				.get("users/" + id + "/team")
				.then((response) => {
					this.myPokemons = response.data;
				})
				.catch((error) => console.log(error));
        }
	},
};
</script>