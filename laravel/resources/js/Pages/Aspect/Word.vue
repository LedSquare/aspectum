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
    <div class="word-group-box">
        <div class="word-box">
            <div v-if="data" v-for="word in data" :key="word.id">
                {{ word.name }}
            </div>
            <div v-else>
                Понятий нет в базе данных, либо произошла другая ошибка
            </div>
        </div>
        <div class="selected-word-box">
        </div>
    </div>


    <div>
        <NextStep :aspect_id="aspect_id"></NextStep>
    </div>
</template>


<style lang="scss" scoped>
.word-group-box {
    border: 10px;
}
</style>
