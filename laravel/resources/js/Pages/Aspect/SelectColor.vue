<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import NextStep from '../../Components/Aspect/Buttons/NextStep.vue';
import { ref, computed, reactive } from 'vue';

const props = defineProps({
    title: String,
    data: Array,
    aspect_id: Number,
});

const clickedWordIndex = ref(props.data.words[0].id);

const clickWord = (index) => {
    clickedWordIndex.value = index
}

const rollIndex = ref(0);

const rightRollColor = (rollIndex, word, colors) => {
    if (rollIndex > (colors.length - 1)) {
        rollIndex = 0;
    }
    rollIndex++
    word.colorCode = colors.hex_code[rollIndex];

}
console.log(props.data.colors.length)
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
            <div @click="clickWord(word.id)" class="word" v-for="(word, id) in  data.words " :key="word.id">
                <div class="word-with-arrows" v-if="clickedWordIndex == word.id">
                    <div class="arrow">
                        &#8249
                    </div>
                    <div :style="['color: ' + word.colorCode]">
                        {{ word.name }}
                    </div>
                    <div class="arrow">
                        &#8250
                    </div>
                </div>
                <div class="word-with-arrows" style="justify-content: center;" v-else>
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

    .word-with-arrows {
        cursor: pointer;
        width: 100%;
        display: flex;
        justify-content: space-between;
        transition: 0.2s ease-in-out;

        >.arrow {
            font-size: 25px;
        }
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
