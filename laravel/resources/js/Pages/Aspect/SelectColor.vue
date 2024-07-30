<script setup>
import { Head } from '@inertiajs/inertia-vue3'
import NextStep from '@/Components/Aspect/Buttons/NextStep.vue'
import WordModal from '@/Components/Aspect/Modals/WordModal.vue'

import { ref, computed, reactive } from 'vue';

const props = defineProps({
    title: String,
    data: Array,
    aspect_id: Number,
});

const modalSwitch = ref(false);
const clickedWord = ref(null);

const clickWord = (word) => {
    modalSwitch.value = !modalSwitch.value
    clickedWord.value = word
}


// const rollIndex = ref(0);

// const rightRollColor = (rollIndex, word, colors) => {
//     if (rollIndex > (colors.length - 1)) {
//         rollIndex = 0
//     }
//     rollIndex++
//     word.colorCode = colors[rollIndex].hex_code
//     console.log(rollIndex)
// }

// const leftRollColor = (rollIndex, word, colors) => {
//     if (rollIndex.value < (colors.length - 1)) {
//         rollIndex.value = colors.length - 1
//     }
//     rollIndex.value--
//     word.colorCode = colors[rollIndex].hex_code
// }

</script>
<template>

    <Head title="Цвет" />
    <div class="aspect-frame">
        <WordModal :modalSwitch="modalSwitch" :colors="data.colors" :word="clickedWord" />
        <div class="colors">
            <div class="color" v-for="color in data.colors" :key="color.id">
                <div :style="['background-color: ' + color.hex_code]" class="color-div"></div>
            </div>
        </div>
        <div class="word-color-box">
            <div @click="clickWord(word)" class="word" v-for="(word, id) in  data.words " :key="word.id">
                <div class="word-with-arrows">
                    <div>
                        {{ word.name }}
                    </div>
                </div>
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
    color: white;
    font-size: 25px;
    font-weight: bold;
    margin: 0.2em;
    user-select: none;
    text-shadow: 0 0 2px black;

    justify-content: center;
    display: flex;

    border-bottom: solid 4px aliceblue;

    transition: 0.2s ease-in-out;

    &:hover {
        border-bottom: solid 4px white;
        transition: 0.2s ease-in-out;
    }

    >div {
        cursor: pointer;
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
