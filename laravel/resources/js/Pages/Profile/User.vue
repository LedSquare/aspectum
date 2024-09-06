<script setup>
import { Head } from "@inertiajs/vue3";
import { computed, ref } from "vue";
import _ from "lodash";

const props = defineProps({
    data: Array,
    title: String,
});
</script>

<template>
    <div>
        <Head :title="title"></Head>
        {{ data }}
    </div>
</template>

<style lang="scss" scoped></style>
