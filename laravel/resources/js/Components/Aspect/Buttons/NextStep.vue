<script setup>
const props = defineProps({
    aspect_id: Number,
});

</script>
<template>
    <div class="button-box">
        <Link :href="route('aspect.post', { aspect: aspect_id })" as="button" class="step-button">
        Следующий шаг
        </Link>
    </div>
</template>

<style lang="scss" scoped>
.button-box {
    margin-top: 0.5em;
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
