<template>
    <div>
        <Header :isLoggedIn="isLoggedIn" />
        <div class="container mt-4">
            <router-view :user="user"></router-view>
        </div>
    </div>
</template>
<script>
import Header from "./Partials/Header.vue";
import axios from 'axios';
export default {
    name: 'App',
    components: {Header},
    data() {
      return {
          user: null
      }
    },
    computed: {
        isLoggedIn() {
            return this.user !== null;
        },
    },
    mounted() {
        this.checkAuth();
    },
    methods: {
        checkAuth() {
            axios.get('/api/user')
                .then(response => {
                    this.user = response.data.data;
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
}
</script>
