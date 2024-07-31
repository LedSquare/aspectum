<template>
    <transition name="modal-animation">
    <div v-show="modalSwitch" class="word-modal" @click.self="onOffModal">
        <div class="inner-modal">
            <div class="colors">
                <div class="color" :style="[rollIndex === id ? 'border: solid 2px black;' : '']" v-for="(color, id) in props.colors" :key="color.id">
                    <div :style="['background-color: ' + color.hex_code]" class="color-div">
                    {{ id }}</div>
                </div>
            </div>
            <div class="word">
                <div class="word-with-arrows">
                    <div @click="rightRollColor(rollIndex, word, data.colors)" class="arrow">
                        &#8249
                    </div>
                    <div :style="['color: ' + word?.colorCode]">
                        {{ word?.name }}
                        {{ rollIndex }}
                    </div>
                    <div class="arrow" @click="rightRollColor(word)">
                        &#8250
                    </div>
                </div>
            </div>
            <div class="button-box">
                <button class="color-button">
                    Выбрать цвет
                </button>
            </div>
        </div>
    </div>
    </transition>
</template>
<script setup>

import {ref} from 'vue';

const props = defineProps({
    modalSwitch: Boolean,
    colors: Array,
    word: { type: Object || null, required: false },
})

const emit = defineEmits(['offModal'])

const onOffModal = () => {
    emit('offModal')
}


const rollIndex = ref(0)

const rightRollColor = (word) => {
    if(rollIndex.value  === null){
        rollIndex.value = 0
    }
    if (rollIndex.value > (props.colors.length - 2 )) {
        rollIndex.value = 0
    }
    word.colorCode = props.colors[rollIndex.value].hex_code
}

</script>


<style lang="scss" scoped>
.modal-animation-enter-active,
.modal-animation-leave-active {
    transition: opacity 0.3s cubic-bezier(0.52, 0.02, 0.19, 1.02);
}

.modal-animation-enter-from,
.modal-animation-leave-to {
    opacity: 0;
}


.word {
    color: white;
    font-size: 40px;
    font-weight: bold;
    margin: 0.2em;
    user-select: none;
    text-shadow: 0 0 2px black;

    justify-content: center;
    align-items: center;
    display: flex;


    >div {
        cursor: pointer;
    }
    .word-with-arrows {
        cursor: pointer;
        width: 100%;
        display: flex;
        justify-content: space-between;
        transition: 0.2s ease-in-out;

        >* {
            display: flex;
            align-items: center;
        }

        >.arrow {
            margin: 0px 1em;
            font-size: 60px;
        }
    }
}

.word-modal {
    flex-direction: column;
    display:flex;
    position: fixed;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100%;
    justify-content: center;
    align-items: center;

    background-color: rgba($color: $blue-gray, $alpha: 0.5);
}

.inner-modal{
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: space-evenly;
    width: 30%;
    height: 50%;
    min-width:500px;
    background-color: aliceblue;
    opacity: 1 !important;
}

.colors {
    display: flex;
    flex-direction: row;
    margin-bottom: 1em;
}

.color{
    border: solid 2px rgba($color: $blue-gray, $alpha: 0);
    border-radius: 10px;
}

.color-div {
    width: 40px;
    height: 15px;
    border: 2px solid black;
    border-radius: 0.8em;
    margin: 3px;
}

.button-box {
    margin-top: 1em;
    margin-bottom: 0.1em;
}

.button-box {
    margin-top: 1em;
    margin-bottom: 0.1em;

    .color-button {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    text-align: center;
    text-decoration: none;
    font-weight: 700;
    cursor: pointer;
    border: 2px solid $blue;
    color: black;
    border-radius: 10px;
    transition:
        background-color 0.3s,
        color 0.3s,
        border 0.3s;

    &:hover {
        background-color: $blue;
        border: 2px solid whitesmoke;
        color: #fff;
    }
}
}


</style>
