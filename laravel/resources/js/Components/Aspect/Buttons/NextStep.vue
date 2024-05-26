<script setup>
const props = defineProps({
    aspect_id: Number,
});

</script>
<template>
    <div>
        <Link :href="route('aspect.post', { aspect: aspect_id })" as="button" class="start-button">
        Следующий шаг
        </Link>
    </div>
</template>

<style lang="scss" scoped></style>
