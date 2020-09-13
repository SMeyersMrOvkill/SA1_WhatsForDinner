<template>
<div>
<table class="table" v-if="show">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
            <th><button class="btn btn-primary" v-on:click="addRestaurant()">New</button></th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="restaurant in restaurants" v-bind:key="restaurant.id">
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
        replaceItems(items) {
            for(let i = 0; i < items.length; i++) {
                this.addItem(items[i]);
            }
        },
        addRestaurant() {
            
        },
        refresh() {
            for(let i = 0; i < this.restaurants.length; i++) {
                this.restaurants.shift();
            }
            const vm = this;
            var data = [];
            var done = false;
            axios.post('/api/v1/restaurant/list/'+this.page).then(function(response) {
                console.log(response);
                console.log(response.data);
                console.log(response.data.data);
                var i = JSON.parse(response.data.data);
                for(let x = 0; x < i.length; x++) {
                    vm.addItem(i[x]);
                }
                
            }).catch(function(error) {
                console.log("ERROR"+error);
            });
        }
    },
    mounted() {
        this.refresh();
    }
}
</script>