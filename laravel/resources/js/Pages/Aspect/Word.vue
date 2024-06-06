<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
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
    console.log(index)

    if (index > -1) {
        selectedWords.value.splice(index, 1);
    } else {
        selectedWords.value.push(word);
    }
}

</script>
<template>

    <Head :title="title" />
    <div>
        {{ aspect_id }}
    </div>
    <div class="aspect-frame">
        <div style="display: flex; flex-direction: row; justify-content: center;">

            <div class=" left-box">
                <div class="word-group-box">
                    <div class="word-box">
                        <div class="word" @click="addWord(word)" v-if="data" v-for="word in data" :key="word.id">
                            {{ word.name }}
                        </div>
                        <div v-else>
                            Понятий нет в базе данных, либо произошла другая ошибка
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-box">
                <div class="selected-words">
                    <div v-for="(word, index) in selectedWords" :key="index">
                        {{ word.name }}
                    </div>
                </div>
            </div>
        </div>
        <NextStep :aspect_id="aspect_id"></NextStep>
    </div>


</template>


<style lang="scss" scoped>
.word-group-box {
    .word {
        cursor: pointer;
        transition: 0.2s ease-in-out;
        font-size: 18px;
        margin: 0.2em;

        &:hover {
            font-size: 22px;
            transition: 0.2s ease-in-out;
        }
    }

    border: 10px;
}

.selected-word-box {
    border: 3px solid black;
}

.right-box {
    width: auto;
    height: auto;
    border: 3px solid black;
}
</style>
