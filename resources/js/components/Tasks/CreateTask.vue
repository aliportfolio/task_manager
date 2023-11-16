<template>
    <div class="card">
        <div class="card-header">
            Add New Task
        </div>
        <div class="card-body">
            <div v-if="status.errors">
                <Message :is-error="true" :message="status.errors" />
            </div>
            <form action="" method="post">
                <div class="form-group mt-2">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" v-model="task.title" id="title">
                </div>
                <div class="form-group mt-2">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" cols="30" rows="5" v-model="task.description"></textarea>
                </div>
                <div class="form-group mt-2">
                    <label for="due_date">Due Date</label>
                    <input type="datetime-local" id="due_date" class="form-control w-50" v-model="task.due_date">
                </div>
                <div class="form-group mt-3">
                    <button type="button" class="btn btn-success" @click="this.create()">Save</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Message from "../Partials/Message.vue";
export default {
    name: "Create",
    props: ['user'],
    components: {Message},
    data() {
        return {
            task: {
                title: '',
                description: '',
                due_date: ''
            },
            status: {
                errors: '',
                success: ''
            }
        }
    },
    methods: {
        create() {
            axios.post('/api/tasks', this.task)
                .then(response => {
                    this.$router.push('/tasks')
                })
                .catch(error => {
                    // Handle registration error
                    this.errors = error.response.data.message
                });
        }
    },
    created() {
        if(!this.user || this.user === null)
            window.location.href = '/'
    }
}
</script>

<style scoped>

</style>
