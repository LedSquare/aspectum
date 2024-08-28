<script setup>
import { useForm } from '@inertiajs/inertia-vue3'
import { ref, toRaw } from 'vue'
import ErrorMessage from '@/Components/Errors/ErrorMessage.vue';

const props = defineProps({
    aspect_id: Number,
    aspect_data: { type: Array, required: true },
    // validate: {type: Function, required: false}
});


const form = useForm({
    aspect_id: props.aspect_id,
    aspect_data: props.aspect_data,
});

const errorMessage = ref(null)

const clearMessage = () => {
    errorMessage.value = null
}

function storeAspect() {
    // if(props.validate){
    //     try {
    //         props.validate(props.aspect_data)
    //     } catch (error) {
    //         errorMessage.value = error.message
    //         return
    //     }
    // }

    form.post(route('aspect.store', form.aspect_id))
}


</script>
<template>
    <div class="button-box">
        <!-- <ErrorMessage :message="errorMessage" @clearMessage="clearMessage"/> -->

        <button @click="storeAspect()" class="step-button">
            Следующий шаг
        </button>
    </div>
</template>

<style lang="scss" scoped>
.button-box {
    margin-top: 1em;
    margin-bottom: 0.1em;
}

.step-button {
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
</style>
