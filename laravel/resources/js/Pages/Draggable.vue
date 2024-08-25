<template>
    <div class="container">
        <div class="list">
            <h2>Список блоков</h2>
            <draggable v-model="blocks" group="blocks" item-key="id">
                <template #item="{ element }">
                    <div class="block">{{ element.name }}</div>
                </template>
            </draggable>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import draggable from 'vuedraggable';

const props = defineProps({
    title: String,
    data: Array,
    aspect_id: Number,
});

const blocks = ref([
    { id: 1, name: 'Блок 1' },
    { id: 2, name: 'Блок 2' },
    { id: 3, name: 'Блок 3' },
]);

const slots = ref([]);

</script>

<style>
.container {
    display: flex;
    justify-content: space-around;
}

.list {
    width: 45%;
    border: 1px solid #ccc;
    padding: 10px;
}

.block,
.slot {
    padding: 10px;
    margin: 5px 0;
    background-color: #f0f0f0;
    border: 1px solid #ccc;
    cursor: pointer;
}

.slot {
    background-color: #e0e0e0;
}
</style>
<!-- <div class="grid-shapes">
    <draggable v-model="data.shape_categories[0].shapes" group="shapes" @change="log">
        <template #item="{ shape }">
            <div>{{ shape.id }}</div>
            <img class="shape" ref="shapeImgElement" alt="some image" :src="'/' + shape.filepath">
        </template>
    </draggable>
</div> -->
