<script setup>
import _ from 'lodash'
import { nextTick, onMounted, ref } from 'vue'
import { Head } from '@inertiajs/vue3'
import BrainIcon from '../../Components/svg/icons/BrainIcon.vue';

const props = defineProps({
    aspect_id: Number,
    data: {type: [Array, Object], required: true},
    title: String,
})

const cloned = _.cloneDeep(props)
const steps = ref(cloned.data.steps)

const arrowUp = ({
    symbol: '&#11165;',
    color: '#56e362' //variables.scss $arrowUp
})
const arrowDown = ({
    symbol: '&#11167;',
    color: '#e78484' //variables.scss $arrowDown
})

const selectPriority = (word) => {
    if(word.priority === undefined || null){
        return null;
    }

    let resultArrow;
    switch (word.priority) {
        case '+':
            resultArrow = arrowUp;
            break;
        case '-':
            resultArrow = arrowDown;
    }

    return resultArrow;
}

const selectSide = (side) => {
    if(side === 'left'){
        return 'brain-left';
    }else if(side === 'right'){
        return 'brain-right';
    }
}

</script>

<template>
    <div class="report-frame">
        <span style="display: none;">
            &#11165;
        </span>
        <Head :title="title"/>
        <div class="brain-icon">
            <BrainIcon />
        </div>
        <h1>
            Облик № {{ aspect_id }} закончен !
        </h1>
        <div class="steps">
            <div class="step-container" :class="[selectSide(step.side)]" v-for="(step, stepIndex) in steps" :key="stepIndex">
                <div class="step">
                    <div class="word" v-for="word in step.words" :key="word.id">
                        <span class="arrow" v-html="selectPriority(word)?.symbol " :style="{color: selectPriority(word)?.color}"></span>
                        <span>
                            {{ word.name }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="mood-levels">

        </div>
    </div>
</template>

<style lang="scss" scoped>

.brain-left{
    background: linear-gradient(90deg, rgba(245, 209, 214) 0%, rgba(255,255,255,1) 100%);
    align-items: start;
}


.brain-right{
    background: linear-gradient(90deg, rgba(255,255,255,1) 0%, rgba(151,189,242,1) 100%);
    align-items: end;
}

.report-frame{
    display: flex;
    flex-direction: column;
    width:100%;
    align-items: center;
}

.brain-icon{
    margin-bottom: 2rem;
}

.mood-levels{
    display: flex;
    widows: 100%;
    height: 50px;
    border-bottom: 2px solid black;
}

.steps{
    padding: 0rem 10rem;
    width: 100%;
    display: flex;
    flex-direction: column;
    border-bottom: 2px solid black;
    overflow-x: auto;

    .step-container{
        display: flex;
        flex-direction: column;
        margin: 10px;
        padding: 0.5rem;
        border-radius: 1rem;

        .step{

            .word{
                display: flex;
                flex-direction: row;
                align-items: center;
                margin-bottom: 5px;

                .arrow{
                    font-size: 20px;
                    margin-right: 2px;
                }
            }
        }

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
