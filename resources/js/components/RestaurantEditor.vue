<template>
<div>
    <button class="btn btn-success" v-if="!show" v-on:click="show = true">Add new restaurant</button>
    <div class="card" v-if="show">
        <div class="card-header">
            <span>Add a restaurant:</span> <button class="btn btn-danger float-right" v-on:click="show = false"><i class="fa fa-times"></i></button>
        </div>
        <div class="card-body">
            <form v-on:submit.prevent>
                <label for="name">Name: </label>
                <input class="form-control" id="name" name="name" v-model="name" />
                <label for="description">Description: </label>
                <input class="form-control" id="description" name="description" v-model="description" />
                <hr />
                <button type="submit" class="btn btn-success" id="submit" v-on:click="submit()">Submit</button>
            </form>
        </div>
    </div>
</div>
</template>
<script>
    export default {
        props: ['p_name', 'p_description', 'p_mode', 'p_profile', 'updateParentList', 'show'],
        data() {
            return {
                name: "",
                description: "",
                mode: 'NEW',
                profile: {}
            };
        },
        mounted() {
            this.name = this.p_name;
            this.description = this.p_description;
            this.mode = this.p_mode;
            if(this.p_profile) {
                this.profile = p_profile;
            }
            console.log('RestaurantEditor component mounted.');
        },
        methods: {
            submit() {
                console.log("Submitting [Name: " + this.name + ", Description: " + this.description + "]...");
                var data = {
                    restaurant: {
                        name: this.name,
                        description: this.description
                    }
                };
                axios.post('/api/v1/restaurant/create', data).then(function(response) {
                    console.log(response.data);
                }).catch(function(error) {
                    console.log(JSON.stringify(error));
                });
            }
        }
    }
</script>
