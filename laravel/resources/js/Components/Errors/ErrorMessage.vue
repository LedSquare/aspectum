<script setup>
import {ref} from 'vue'

const props = defineProps({
    message: String,
})

const emit = defineEmits(['clearMessage'])

const onClear = () =>{
    emit('clearMessage')
}

</script>

<template>
  <div v-if="message" class="error">
    <p>{{ message }}</p>
    <button @click="onClear">Закрыть</button>
  </div>
</template>

<style lang="scss" scoped>


.error {
    position: fixed;
    top: 10px;
    left: 50%;
    transform: translateX(-50%);
    background-color: #ff6b6b;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 1000;

    p{
        margin: 0;
    }
    button{
        background-color: transparent;
        border: none;
        color: white;
        cursor: pointer;
        margin-left: 10px;
    }
}

</style>

