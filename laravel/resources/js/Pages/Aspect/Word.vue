<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import NextStep from '../../Components/Aspect/Buttons/NextStep.vue';
import { ref, watch, computed } from 'vue';

const props = defineProps({
    title: String,
    data: Array,
    aspect_id: Number,
});

const selectedWords = ref([])

function addWord(word) {
    const index = selectedWords.value.findIndex((item) => item === word);

    if (selectedWords.value.length > 7) {
        console.log('Перебор слов')
        selectedWords.value.splice(index, 1)
    } else if (index > -1) {
        selectedWords.value.splice(index, 1)
    } else {
        selectedWords.value.push(word);
    }
}
</script>

<template>

    <Head title="Выбор понятий" />
    <div>
        {{ aspect_id }}
    </div>
    <div class="aspect-frame">
        <div class="word-box">

            <div class="left-box">
                <div :class="{ 'some': true }" class="word" @click="addWord(word)" v-if="data" v-for="word in data"
                    :key="word.id">
                    {{ word.name }}
                </div>
                <div v-else>
                    Понятий нет в базе данных, либо произошла другая ошибка
                </div>
            </div>
            <div class="right-box" id="selected-words-box">
                <div class="selected-words">
                    <div @click="addWord(word)" class="word" v-for="(word, index) in selectedWords" :key="index">
                        {{ word.name }}
                    </div>
                </div>
            </div>
        </div>
        <NextStep :words="selectedWords" :aspect_id="aspect_id" :store="true"></NextStep>
    </div>


</template>


<style lang="scss" scoped>
.word-box {
    display: flex;
    flex-direction: row;
    justify-content: center;
    justify-content: space-evenly;
    width: 60%;
}

::-webkit-scrollbar {
    background: $body-background;
}

::-webkit-scrollbar-thumb {
    background: $blue;
    border-radius: 1em;
}

.left-box {
    min-width: 12em;
    max-height: 30em;
    overflow-y: scroll;
    border-radius: 15px;
    background-color: Snow;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.right-box {
    min-width: 12em;
    max-height: 30em;
    border-radius: 15px;
    background-color: Snow;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    position: sticky;
}

.word {
    cursor: pointer;
    font-size: 18px;
    margin: 0.2em;
    user-select: none;

    justify-content: center;
    display: flex;

    transition: 0.2s ease-in-out;

    &:hover {
        font-size: 22px;
        transition: 0.2s ease-in-out;
    }
}
</style>
