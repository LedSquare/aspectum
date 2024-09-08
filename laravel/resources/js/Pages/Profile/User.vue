<script setup>
import { Head } from "@inertiajs/vue3";
import { computed, ref } from "vue";
import _ from "lodash";
import InputGroup from "@/Components/Forms/InputGroup.vue"

const props = defineProps({
    data: Array,
    title: String,
});
</script>

<template>
    <div class="profile-container">
        <Head :title="title"></Head>
        <div class="personal-info">
            <header>
                <p>
                    Персональные данные
                </p>
            </header>
            <div>
            <input-group>

            </input-group>
                <pre>
                    {{ data }}
                </pre>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
.personal-info{
    width: 100%;
    display: flex;
    flex-direction: column;
}

header{
    width: 100%;
    border-bottom: 2px solid $blue-gray;
    margin-bottom: 10px;
    p{
        margin: 1rem;
    }
}
.profile-container{
    width: 100%;
    min-height: 900px;
    box-sizing: border-box;
}
</style>
