<template>
    <div class="card">
        <div class="card-header">
            My Tasks
            <div class="filter my-2">
                <div class="form-group">
                    <label>Filter By Status:</label>
                    <select class="form-control" v-model="filter.status">
                        <option value="" selected>All</option>
                        <option value="new">New</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label>Filter By Keyword:</label>
                    <input type="text" class="form-control" v-model="filter.keyword">
                </div>
                <div class="form-group mt-2">
                    <label>Filter By Due Date:</label>
                    <input type="date" class="form-control" v-model="filter.due_date">
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(task, index) in filteredTasks" :key="task.id">
                        <td :style="task.status == 'completed' ? 'text-decoration: line-through' : ''">{{ task.title }}</td>
                        <td>{{ task.due_date }}</td>
                        <td>{{ task.status }}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-success btn-sm" @click="updateStatus(task.id, index)">
                                    <span v-if="task.status == 'new'">Complete</span>
                                    <span v-else>Reset</span>
                                </button>
                                <router-link :to="`/tasks/${task.id}/edit`" class="btn btn-primary btn-sm">
                                    Edit
                                </router-link>
                                <button type="button" class="btn btn-danger btn-sm" @click="deleteTask(task.id, index)">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "Show",
    props: ['user'],
    data() {
        return {
            tasks: [],
            filter: {
                status: '',
                keyword: '',
                due_date: ''
            }
        }
    },
    computed: {
        filteredTasks() {
            if (this.filter.status) {
                return this.tasks.filter(task => task.status === this.filter.status);
            } else if(this.filter.keyword) {
                return this.tasks.filter(task => task.title.toLowerCase().includes(this.filter.keyword))
            } else if(this.filter.due_date) {
                const filterDate = new Date(this.filter.due_date).toLocaleDateString();
                return this.tasks.filter(
                    task => new Date(task.due_date).toLocaleDateString() === filterDate
                );
            } else {
                return this.tasks;
            }
        }
    },
    async created() {
        if(!this.user || this.user === null)
            window.location.href = '/'
        try {
            const response = await axios.get('/api/tasks');
            this.tasks = response.data.data;
        } catch (error) {
            console.error(error);
        }
    },
    methods: {
        async updateStatus(taskId, index) {
            try {
                await axios.get(`/api/tasks/${taskId}/change-status`)
                .then((response) => {
                    this.tasks[index] = response.data
                })
            } catch (error) {
                console.error(error);
            }
        },
        async deleteTask(taskId, index) {
            try {
                await axios.delete(`/api/tasks/${taskId}`)
                    .then((response) => {
                        this.tasks.splice(index, 1);
                    })
            } catch (error) {
                console.error(error);
            }
        },
        formatDate(date) {
            return new Date(date).toLocaleDateString();
        }
    }
}
</script>

<style scoped>

</style>
