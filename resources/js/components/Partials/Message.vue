<template>
    <div :class="isError ? 'alert alert-danger' : 'alert alert-success' ">{{ message }}</div>
</template>

<script>
export default {
    name: "Message",
    props: ['message', 'isError']
}
</script>

<style scoped>

</style>
