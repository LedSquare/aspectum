<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import NextStep from '../../Components/Aspect/Buttons/NextStep.vue';
import { ref } from 'vue';

const props = defineProps({
    title: String,
    data: Array,
    aspect_id: Number,
});

</script>
<template>
    <div class="aspect-frame">

    </div>
</template>

<style lang="scss" scoped></style>
