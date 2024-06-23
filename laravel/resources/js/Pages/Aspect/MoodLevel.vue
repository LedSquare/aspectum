<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import NextStep from '../../Components/Aspect/Buttons/NextStep.vue';
import { ref } from 'vue';

const props = defineProps({
    title: String,
    data: Array,
    aspect_id: Number,
});

const moodData = ref([])

function setMood(mood) {
    moodData.value = mood
}

</script>
<template>

    <Head title="Уровень настроения" />
    <div class="aspect-frame">

        <div class="mood-level-box">
            <div v-for="mood in data">
                <input @click="setMood(mood)" type="radio" name="mood"></input>
                <label :for="mood.id">{{ mood.procent }} %</label>
            </diV>
        </div>
        <NextStep :aspect_data="moodData" :aspect_id="aspect_id"></NextStep>
    </div>

</template>

<style lang="scss" scoped></style>
