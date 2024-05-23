<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    title: String,
    data: Array,
});


</script>
<template>

    <Head :title="title" />

    <div v-if="data !== null" v-for="word in data" :key="word.id">
        <div>
            Понятие: {{ word.name }}
        </div>
    </div>
    <div v-else>
        Понятий нет в базе данных, либо произошла другая ошибка
    </div>
</template>

<style lang="scss" scoped></style>
