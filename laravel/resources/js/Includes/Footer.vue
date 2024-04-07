<template>
    <footer class="flex-c">
        <div>
            Я подвал
        </div>
    </footer>
</template>

<script>
export default {
    name: 'Footer',
    created() {

    },
    data() {
        return {
        }
    },
    props: {

    },
    methods: {

    },
}
</script>

<style lang="scss" scoped>
footer {
    padding: 10px;
    display: flex;
    background-color: $body-background;
    height: $header-footer-height;

    >div {
        display: flex;
        width: 1180;
        height: 100%;
        padding: 0px 10px;
        border-radius: 10px;
        background-color: $blocks-background;
    }
}
</style>
