<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import NextStep from '../../Components/Aspect/Buttons/NextStep.vue';
import { ref } from 'vue';

const props = defineProps({
    title: String,
    data: Array,
    aspect_id: Number,
});

const activeCategory = ref(1);
const setActiveCategory = (categoryId) => {
    activeCategory.value = categoryId
}
</script>
<template>

    <Head title="Фигуры"></Head>
    <div class="aspect-frame">
        <div class="tabs-rows">
            <div class="shape-tab" @click="setActiveCategory(shape_category.id)"
                v-for="shape_category in data.shape_categories" :key="shape_category.id">
                <h2>
                    {{ shape_category.name }}
                </h2>
            </div>
        </div>
        <div v-for="shape in data.shape_categories.find(category => category.id === activeCategory).shapes">
            <img class="shape" alt="some image" :src="'/' + shape.filepath">
        </div>
    </div>
</template>

<style lang="scss" scoped>
.tabs-rows {
    display: flex;
    flex-direction: row;

}

h2 {
    font-size: 1.2rem;
}

.shape-tab {
    display: flex;
    flex-direction: column;
    padding: 0.5rem;
    margin: 0px 2px;
}


.shape {
    width: 90;
    height: 90;
}
</style>
