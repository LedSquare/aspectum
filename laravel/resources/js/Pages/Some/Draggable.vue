<template>
    <div class="drop-zone" @drop="onDrop($event, words)">
        <div class="drag-el" v-for="word in words" :key="word.id" draggable="true" @dragstart="onStartWords($event, word)">
            {{ word.name }}
        </div>
    </div>

    <div class="drop-zone">
        <div
            class="drag-el"
            v-for="(slot, index) in slots"
            :key="slot?.id"
            draggable="true"
            @drop="onDrop($event, index)"
            @dragstart="onStartSlots($event, index)"
            @dragenter.prevent
            @dragover.prevent
            >
            {{ slot?.name }}
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const props = defineProps({
    data: Array | Object
})

const words = ref(props.data)
const slots = ref(Array(8).fill(null))



const onStartWords = (event, word) => {
    event.dataTransfer.dropEffect = 'move'
    event.dataTransfer.effectAllowed = 'move'
    event.dataTransfer.setData('itemId', word.id)
}

function swapSlots(dragged, repleceable) {
    const temp = slots.value[repleceable]
    slots.value[repleceable] = slots.value[dragged]
    slots.value[dragged] = temp
}

const onStartSlots = (event, dragIndex) => {
    event.dataTransfer.dropEffect = 'move'
    event.dataTransfer.effectAllowed = 'move'
    event.dataTransfer.setData('dragIndex', dragIndex)
}

const onDrop = (event, slotIndex) => {
    const itemId = Number(event.dataTransfer.getData('itemId'))
    if(itemId) {
        const item = words.value.find((word) => word.id === itemId)
        slots.value[slotIndex] = item
        words.value = words.value.filter(word => word.id !== itemId)
        return
    } else {
        const dragIndex = Number(event.dataTransfer.getData('dragIndex'))
        if(dragIndex === null){
            throw new Error("Идентификатор перемещаемого слота пустой");
        }
        swapSlots(dragIndex, slotIndex)
    }

}




</script>

<style lang="scss" scoped>
.drop-zone{
    display: flex;
    flex-direction: column;
    margin: 20px 0px;
    padding: 5px;
    background-color:burlywood;
    width: 20%;
    box-sizing: border-box;

}

.drag-el{
    height: 1.5rem;
    width: 90%;
    background-color: $blue;
    border: 2px solid black;
    margin:5px 5px;
    cursor: pointer;
}
</style>
