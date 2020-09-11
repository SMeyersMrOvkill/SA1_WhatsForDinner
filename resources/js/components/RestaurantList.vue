<template>
<div>
<table class="table" v-if="show">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
            <th><button class="btn btn-primary" v-on:click="refresh()">New</button></th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="restaurant in restaurants">
            <td>{{restaurant.name}}</td>
            <td>{{restaurant.description}}</td>
        </tr>
    </tbody>
</table>
</div>
</template>
<script>
export default {
    data() {
        return {
            restaurants: [],
            page: 0,
            show: true
        };
    },
    methods: {
        showItem(id) {

        },
        hideSelf() {

        },
        addItem(item) {
            this.restaurants.push(item);
        },
        addRestaurant() {
            
        },
        refresh() {
            this.restaurants.shift();
            const vm = this;
            var data = [];
            var done = false;
            axios.post('/api/v1/restaurant/list/'+this.page).then(function(response) {
                console.log(response);
                console.log(response.data);
                console.log(response.data.data);
                var i = JSON.parse(response.data.data);
                vm.addItem(i[0]);
            }).catch(function(error) {
                console.log("ERROR"+error);
            });
            for(var i = 0; i < data.length; i++) {
                this.restaurants.push(data[i]);
            }
        }
    },
}
</script>