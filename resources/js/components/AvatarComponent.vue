<template>
	<div class="container avatar">

		<!-- Modal -->
		<div class="modal fade" id="modalSelect" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body d-flex align-items-center">
						<img :src="'images/icon/'+this.icon+'.svg'" alt="icon 1" width="64px">

						<span class="pl-4">
							Do you really want to choose {{pokemon}} ? <br>
						</span>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal" @click="saveChange">Yes</button>
					</div>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">Please select a profile icon</div>

					<div class="card-body">
						<ul>
							<li type="button" @click="select(1,'Bulbasaur')" class="">
								<img src="images/icon/1.svg" alt="icon 1" width="64px"> <span class="pl-5">Bulbasaur</span>
							</li>
							<li type="button" @click="select(2,'Charmander')" class="">
								<img src="images/icon/2.svg" alt="icon 1" width="64px"> <span class="pl-5">Charmander</span>
							</li>
							<li type="button" @click="select(3,'Squirtle')" class="">
								<img src="images/icon/3.svg" alt="icon 1" width="64px"> <span class="pl-5">Squirtle</span>
							</li>
							<li type="button" @click="select(4,'Pikachu')" class="">
								<img src="images/icon/4.svg" alt="icon 1" width="64px"> <span class="pl-5">Pikachu</span>
							</li>
							<li type="button" @click="select(5,'Jigglypuff')" class="">
								<img src="images/icon/5.svg" alt="icon 1" width="64px"> <span class="pl-5">Jigglypuff</span>
							</li>
							<li type="button" @click="select(6,'Voltorb')" class="">

								<img src="images/icon/6.svg" alt="icon 1" width="64px"> <span class="pl-5">Voltorb</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			message: "",
			icon: "",
			pokemon: "",
		};
	},
	mounted() {
		// console.log('Component mounted.')
	},
	methods: {
		select(id, pokemon) {
			this.icon = id;
			this.pokemon = pokemon;
			$("#modalSelect").modal("show");
		},
		saveChange() {
			axios
                .post("/avatar",{
                    file_name: this.icon
                })
				.then((response) => {
                    if(response.data){
                        this.$router.go('/')
                    }
				})
				.catch((error) => console.log(error));
		},
	},
};
</script>
