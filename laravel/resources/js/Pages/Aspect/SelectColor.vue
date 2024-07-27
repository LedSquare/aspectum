<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import NextStep from '../../Components/Aspect/Buttons/NextStep.vue';
import { ref, computed } from 'vue';

const props = defineProps({
    title: String,
    data: Array,
    aspect_id: Number,
});



</script>
<template>

    <Head title="Цвет" />
    <div class="aspect-frame">
        <div class="colors">
            <div class="color" v-for="color in data.colors" :key="color.id">
                <div :style="['background-color: ' + color.hex_code]" class="color-div"></div>
            </div>
        </div>
        <div class="word-color-box">
            <div class="word" v-for="(word, id) in data.words" :key="word.id">
                {{ word.name }}
            </div>
        </div>
        <NextStep :aspect_data="words" :aspect_id="aspect_id"></NextStep>
    </div>

</template>

<style lang="scss" scoped>
.word-color-box {
    min-width: 12em;
    max-height: 30em;
    border-radius: 15px;
    background-color: aliceblue;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.word {
    cursor: pointer;
    color: white;
    font-size: 25px;
    font-weight: bold;
    margin: 0.2em;
    user-select: none;
    text-shadow: 0 0 2px black;

    justify-content: center;
    display: flex;

    transition: 0.2s ease-in-out;

    &:hover {
        font-size: 22px;
        transition: 0.2s ease-in-out;
    }
}

.colors {
    display: flex;
    flex-direction: row;
    margin-bottom: 1em;
}

.color-div {
    width: 55px;
    height: 15px;
    border: 2px solid black;
    border-radius: 0.8em;
    margin: 3px;
}
</style>
