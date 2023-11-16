<template>
    <div class="card">
        <div class="card-header">
            Create Account
        </div>
        <div class="card-body">
            <div v-if="errors">
                <Message :is-error="true" :message="errors" />
            </div>
            <form action="" method="post">
                <div class="form-group mt-2">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" v-model="name" id="name">
                </div>
                <div class="form-group mt-2">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" v-model="email" id="email">
                </div>
                <div class="form-group mt-2">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" v-model="password" id="password">
                </div>
                <div class="form-group mt-2">
                    <button type="button" class="btn btn-success" @click="this.register()">Register</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Message from "../Partials/Message.vue";
export default {
    name: "Register",
    components: {Message},
    data() {
        return {
            name: '',
            email: '',
            password: '',
            errors: ''
        };
    },
    methods: {
        register() {
            axios.post('/register', {
                name: this.name,
                email: this.email,
                password: this.password
            })
                .then(response => {
                    window.location.href = '/tasks'
                })
                .catch(error => {
                    // Handle registration error
                    this.errors = error.response.data.message
                });
        },
    },
}
</script>

<style scoped>

</style>
