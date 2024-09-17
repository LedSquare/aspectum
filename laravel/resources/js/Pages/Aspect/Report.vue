<script setup>
import _ from 'lodash'
import { nextTick, onMounted, ref } from 'vue'
import { Head } from '@inertiajs/vue3'

const props = defineProps({
    aspect_id: Number,
    data: {type: [Array, Object], required: true},
    title: String,
})

const cloned = _.cloneDeep(props)
const words = ref(cloned.data.words)

/**
 * SVG styles
 */
const wordsDiv = ref()
const svgWidth = ref()
const svgHeight = ref()
const firstHalfHeightSvg = ref()
const svgShow = ref(false)

const strokeColor = (word) => {
    if(word.colorCode === null || undefined){
        return '#3b4655' // $blue-gray: #3b4655; (_variables.scss)
    }

    return word.colorCode
}

onMounted(() =>{
    const { width, height } = wordsDiv.value[0].getBoundingClientRect()
    svgWidth.value = width
    svgHeight.value = height
    firstHalfHeightSvg.value = svgHeight.value / 8 / 2

    svgShow.value = true
})



const getPathData = (word, wordIndex, nextStepIndex) => {

    let result = svgHeight.value / 8
    wordIndex += 1

    const findedWords = words.value[nextStepIndex]
    if(findedWords === undefined || null){
        return
    }

    const nextWordIndex = findedWords.findIndex(item => item.id === word.id)

    return `M 0 ${(result * wordIndex) - firstHalfHeightSvg.value} L ${svgWidth.value} ${result * nextWordIndex + firstHalfHeightSvg.value}`
}



</script>

<template>
    <div class="report-frame">
        <Head :title="title"/>

        <div class="mood-levels">

        </div>
        <div class="steps">
            <div class="step" v-for="(step, stepIndex) in words" :key="stepIndex">
                <div ref="wordsDiv" class="words">
                    <div
                        class="word"
                        v-for="(word) in step"
                        :key="word.id"
                        :style="['color:' + word.colorCode]"
                    >
                        {{ word.name }}
                    </div>
                </div>
                <div class="arrows">
                    <svg v-if="svgShow" :width="svgWidth" :height="svgHeight">
                        <path
                            v-for="(word, wordIndex) in step"
                            :d="getPathData(word, wordIndex, stepIndex + 1)"
                            :key="word.id"
                            :stroke="strokeColor(word)"
                            stroke-width="2px"
                        />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
.report-frame{
    display: flex;
    flex-direction: column;
    width:100%;
}

.mood-levels{
    display: flex;
    widows: 100%;
    height: 50px;
    border-bottom: 2px solid black;
}

.steps{
    width: 100%;
    display: flex;
    border-bottom: 2px solid black;
    overflow-x: auto;

    .step{
        display: flex;
        flex-direction: row;
        margin: 10px;
    }
}

.word{
    font-size: 20px;
    font-weight: bold;
    color: $blue-gray;
    text-shadow: 1px 1px 1px $blue-gray;
}



.arrows{
    margin-left: 10px;
}

</style>
