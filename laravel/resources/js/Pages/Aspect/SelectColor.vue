<script setup>
import { Head } from '@inertiajs/inertia-vue3'
import NextStep from '@/Components/Aspect/Buttons/NextStep.vue'
import WordModal from '@/Components/Aspect/Modals/WordModal.vue'

import { ref } from 'vue';

const props = defineProps({
    title: String,
    data: Array,
    aspect_id: Number,
});
const selectedWords = ref(props.data.words)
const modalSwitch = ref(false)
const clickedWord = ref();

const clickWord = (word) => {
    modalSwitch.value = !modalSwitch.value
    clickedWord.value = word
}


const offModal = () => {
    modalSwitch.value = false
}

const setColorOfWord = (emitWord, emitColor) => {
    id = props.data.words.findIndex(word => word.id === emitWord.id)

}

// const deleteColorFromProps = (id)
</script>
<template>

    <Head title="Цвет" />
    <div class="aspect-frame">
        <WordModal :modalSwitch="modalSwitch" :colors="data.colors" :word="clickedWord" @offModal="offModal" @selectColor="setColorOfWord" />

        <div class="word-color-box">
            <div @click="clickWord(word)" class="word" v-for="(word, id) in  data.words " :key="word.id">
                    <div :style="['color: ' + word.colorCode]">
                        {{ word.name }}
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
</style>
