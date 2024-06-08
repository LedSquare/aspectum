<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import NextStep from '../../Components/Aspect/Buttons/NextStep.vue';
import { ref } from 'vue';

const props = defineProps({
    title: String,
    data: Array,
    aspect_id: Number,
});

const selectedWords = ref([])

function addWord(word) {
    const index = selectedWords.value.findIndex((item) => item === word);

    if(selectedWords.value.length > 7){
        console.log('Дохуя слов')
        selectedWords.value.splice(index, 1);
    } else if (index > -1) {
        selectedWords.value.splice(index, 1);
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
        <div style="display: flex; flex-direction: row; justify-content: center;">

            <div class="left-box">
                    <div class="word" @click="addWord(word)" v-if="data" v-for="word in data" :key="word.id">
                        {{ word.name }}
                    </div>
                    <div v-else>
                        Понятий нет в базе данных, либо произошла другая ошибка
                    </div>
            </div>
            <div class="right-box">
                <div class="selected-words">
                    <div @click="addWord(word)" class="word" v-for="(word, index) in selectedWords" :key="index">
                        {{ word.name }}
                    </div>
                </div>
            </div>
        </div>
        <NextStep :aspect_id="aspect_id"></NextStep>
    </div>


</template>


<style lang="scss" scoped>

.left-box {
    min-width: 12em;
    border-radius: 15px;
    background-color: Snow;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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

.right-box {
    min-width: 12em;
    border-radius: 15px;
    background-color: Snow;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}
</style>
