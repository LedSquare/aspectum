<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import NextStep from '../../Components/Aspect/Buttons/NextStep.vue';

const props = defineProps({
    title: String,
    data: Array,
    aspect_id: Number,
});


</script>
<template>

    <Head :title="title" />
    {{ aspect_id }}
    <div v-if="data !== 0" v-for="word in data" :key="word.id">
        <div>
            {{ word.name }}
        </div>
    </div>
    <div v-else>
        Понятий нет в базе данных, либо произошла другая ошибка
    </div>
    <div>
        <NextStep :aspect_id="aspect_id"></NextStep>
    </div>
</template>


<style lang="scss" scoped></style>
