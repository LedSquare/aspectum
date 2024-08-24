<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import NextStep from '../../Components/Aspect/Buttons/NextStep.vue';
import { ref, onMounted } from 'vue';
import { draggable } from 'vuedraggable'

const props = defineProps({
    title: String,
    data: Array,
    aspect_id: Number,
});

const activeCategory = ref(1);
const setActiveCategory = (categoryId) => {
    activeCategory.value = categoryId
}
//color code is $blue
let activeCategoryStyle = 'border-bottom: solid 4px rgba(193, 218, 253, 1)'

// const shapeImgElement = ref()
// const shapeSlotElement = ref()

// onMounted(() => {
//     /**
//      * get proportions from source shape element
//      */
//     const { width, height } = shapeImgElement.value[0].getBoundingClientRect()
//     shapeSlotElement.value.style.width = `${width}px`
//     shapeSlotElement.value.style.height = `${height}px`
// })

const activeShapes = () => {
    return props.data.shape_categories.find(category => category.id === activeCategory.value).shapes
}

</script>
<template>

    <Head title="Фигуры"></Head>
    <div class="aspect-frame">
        <div class="shape-slots">
            <div class="shape-slot" ref="shapeSlotElement">

            </div>
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
            <draggable :list="activeShapes()" group="shapes" @change="log">
                <div v-for="shape in activeShapes()">
                    <img class="shape" ref="shapeImgElement" alt="some image" :src="'/' + shape.filepath">
                </div>
            </draggable>
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
