<template>
    <div class="card">
        <div class="card-header">
            Login
        </div>
        <div class="card-body">
            <div v-if="errors">
                <Message :is-error="true" :message="errors" />
            </div>
            <form action="" method="post">
                <div class="form-group mt-2">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" v-model="email" id="email">
                </div>
                <div class="form-group mt-2">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" v-model="password" id="password">
                </div>
                <div class="form-group mt-2">
                    <button type="button" class="btn btn-success" @click="this.login()">Login</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Message from "../Partials/Message.vue";
export default {
    name: "Login",
    components: {Message},
    data() {
        return {
            email: '',
            password: '',
            errors: ""
        };
    },
    methods: {
        login() {
            axios.post('/login', {
                email: this.email,
                password: this.password,
            })
                .then(response => {
                    window.location.href = '/tasks'
                })
                .catch(error => {
                    // Handle login error
                    this.errors = error.response.data.message
                });
        },
    },
}
</script>

<style scoped>

</style>
