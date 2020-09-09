<template>
<div>
<table class="table table-hover" v-if="show">
    <thead>
        <tr>Name</tr>
        <tr>Description</tr>
        <tr>Edit</tr>
        <tr>Delete</tr>
        <tr><button class="btn btn-primary" v-on:click="addRestaurant()">New</button></tr>
    </thead>
</table>
</div>
</template>
<script>
export default {
    props: ['restaurants'],
    data() {
        return {
        };
    },
    methods: {
        showItem(id) {

        },
        hideSelf() {

        },
        addRestaurant() {
            
        }
    },
}
</script>