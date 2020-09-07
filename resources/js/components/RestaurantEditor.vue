<template>
<div class="card" v-if="show">
    <div class="card-header"><h3>Add a restaurant:</h3></div>
    <div class="card-body">
        <form>
            <label for="name">Name: </label>
            <input class="form-control" id="name" name="name" v-model="name" />
            <label for="description">Description: </label>
            <input class="form-control" id="description" name="description" v-model="description" />
            <hr />
            <button type="submit" class="btn btn-success" id="submit" v-on:click="submit()">Submit</button>
        </form>
    </div>
</div>
</template>
<script>
    export default {
        props: ['p_name', 'p_description'],
        data: {
            show: false,
            name: "",
            description: "",
        },
        mounted() {
            this.name = this.p_name;
            this.description = this.p_description;
            console.log('RestaurantEditor component mounted.');
        },
        methods: {
            submit() {
                this.preventDefault();
                console.log("Submitted[Name: " + this.name + ", Description: " + this.description + "]");
            }
        }
    }
</script>
