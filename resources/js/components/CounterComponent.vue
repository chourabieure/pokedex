<template>
	<div class="nav-link">
		<new-pokemon-comp v-bind:message="message"></new-pokemon-comp>
		<a type="button" v-if="hours" data-toggle="tooltip" data-placement="bottom" title="Time remaining before new pokemon">
            {{ hours  }}:{{ minutes  }}:{{(seconds<10)?'0'+seconds:''+seconds}}
            </a>
	</div>
</template>

<script>
export default {
	data() {
		return {
			now: Math.trunc(new Date().getTime() / 1000),
			time: "",
			date: "",
			couldown_sec: 60*60*24,
			// couldown_sec: 120,
            last_pokemon: {},
            message: ""
		};
	},
	mounted() {
		//Timer
		window.setInterval(() => {
			this.now = Math.trunc(new Date().getTime() / 1000);

			let time_past = Math.round(
				Math.abs(this.last_pokemon - new Date()) / 1000 - 3600
			);
			if (time_past >= this.couldown_sec || time_past < 0) {
                this.resetTime();
			}
		}, 1000);

		//Update the date
		axios
			.get("users/me/time")
			.then((response) => {
				this.last_pokemon = new Date(response.data.time);
				console.log(response.data.time);
				this.getNextTime(this.last_pokemon)
			})
			.catch((error) => console.log(error)); 
	},
	methods: {
		getNextTime(last_pok) {
                          
			// FOR 1 DAYS
			this.date =
				last_pok.getFullYear() +
				"-" +
				(last_pok.getMonth() + 1) +
				"-" +
				(last_pok.getDate() + 1) +
				" " +
				last_pok.getHours() +
				":" +
				last_pok.getMinutes() +
				":" +
				last_pok.getSeconds();
		},
		resetTime() {
			axios
				.patch("users/resetTime")
				.then((response) => {
                    this.last_pokemon = new Date(response.data.time);
                    this.getNextTime(this.last_pokemon)

                    if(response.data.team_full === true){
                        this.message = {
                            title:"Wait !",
                            description:"Your Team was Full ! No Pokemon for you"
                        }
                    }else{
                         this.message = {
                            title:"NEW POKEMON !",
                            description:"A new Pokemon has been added to your Team ! Go check it out !"
                         }
                    }
                    $('#exampleModal').modal()
				})
                .catch((error) => console.log(error));
            
           
		},
	},
	computed: {
		dateInMilliseconds() {
			return Math.trunc(Date.parse(this.date) / 1000);
		},
		seconds() {
			return (this.dateInMilliseconds - this.now) % 60;
		},
		minutes() {
			return Math.trunc((this.dateInMilliseconds - this.now) / 60) % 60;
		},
		hours() {
			return (
				Math.trunc((this.dateInMilliseconds - this.now) / 60 / 60) % 24
			);
		},
		days() {
			return Math.trunc(
				(this.dateInMilliseconds - this.now) / 60 / 60 / 24
			);
		},
	},
};
</script>
