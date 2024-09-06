<script setup>
import Head from "@inertiajs/vue3";
import { computed, ref } from "vue";

const props = defineProps({
    data: Array,
    title: String,
});
</script>

<template>
    <div>{{ data }}</div>
</template>

<style lang="scss" scoped></style>
