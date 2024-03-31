<script setup>
import { Head } from '@inertiajs/inertia-vue3'
</script>
<template>

    <Head :title="title" />

    <div class="start-page flex-c">
        <h1>Облик</h1>
        <a href="#"><button class="start-button">Начать</button></a>
    </div>
</template>

<script>
export default {
    name: 'Home',
    components: {
        Head
    },
    created() {
        console.log(this.title);
    },
    data() {
        return {
        }
    },
    props: {
        title: String,
    },
    methods: {

    },
}
</script>

<style lang="scss" scoped></style>
