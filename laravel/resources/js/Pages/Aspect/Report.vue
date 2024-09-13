<script setup>
import _ from 'lodash'
import { ref } from 'vue';

const props = defineProps({
    aspect_id: Number,
    data: {type: Array || Object, required: true},
    title: String,
})

const cloned = _.cloneDeep(props);
const words = ref(cloned.data.words);
console.log(words);


</script>

<template>
    <div class="report-frame">
        <div class="mood-levels">

        </div>
        <div class="steps">
            <div class="step" v-for="(step, index) in words" :key="index">
                <div class="word" v-for="word in step" :key="word.id">
                    {{ word.colorCode }}
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
    .step{
        margin: 10px;
    }
}
</style>
