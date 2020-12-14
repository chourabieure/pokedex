<template>
	<div class="row w-100">
		<img :src="'images/sprite/normal/'+pokemon_info.id+'.png'" alt="image_pokemon" width='70px'>
		<div class="col-7">
			<div class="d-flex">
				<h3 class="px-1">{{(pokemon_info.id<10)?'00':''}}{{(pokemon_info.id<100&&pokemon_info.id>=10)?'0':''}}{{pokemon_info.id}}
				</h3>
				<h3 class="px-1">{{pokemon_info.nom_pok}}</h3>
			</div>
			<div class="d-flex">
				<h5 class="px-1">{{pokemon_info.type.type1}}</h5>
				<h5 class="px-1">{{pokemon_info.type.type2}}</h5>
			</div>

		</div>
	</div>
</template>

<script>
export default {
	props: ["pokemon_info"],
	mounted() {
		// console.log('Component mounted.')
	},
};
</script>
