<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import NextStep from '../../Components/Aspect/Buttons/NextStep.vue';
import { ref, onMounted, computed } from 'vue';

const props = defineProps({
    title: String,
    data: Array,
    aspect_id: Number,
});

const activeCategory = ref(1);
const setActiveCategory = (categoryId) => {
    activeCategory.value = categoryId
}

let activeCategoryStyle = 'border-bottom: solid 4px rgba(193, 218, 253, 1)'


</script>
<template>

    <Head title="Фигуры"></Head>
    <div class="aspect-frame">
        <div :style="[activeCategoryStyle]">

        </div>
        <div class="tabs-rows">
            <div class="category-tab" @click="setActiveCategory(shape_category.id)"
                v-for="shape_category in data.shape_categories" :key="shape_category.id">
                <h2 id="get-style" :style="[activeCategory === shape_category.id ? activeCategoryStyle : '']">
                    {{ shape_category.name }}
                </h2>
            </div>
        </div>
        <div class="grid-shapes">
            <div v-for="shape in data.shape_categories.find(category => category.id === activeCategory).shapes">
                <img class="shape" alt="some image" :src="'/' + shape.filepath">
            </div>
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
    color: $blue-gray;
    border-bottom: solid 4px rgba($color: $blue, $alpha: 0);
    border-radius: 0.1rem;
}

.category-tab {
    display: flex;
    flex-direction: column;
    padding: 0.5rem;
    margin: 0px 2px;
    cursor: pointer;
}

.shape {
    width: 90;
    height: 90;
}

.grid-shapes {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
}
</style>
