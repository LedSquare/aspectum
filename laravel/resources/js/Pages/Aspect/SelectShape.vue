<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import NextStep from '../../Components/Aspect/Buttons/NextStep.vue';
import { ref } from 'vue';

const props = defineProps({
    title: String,
    data: Array,
    aspect_id: Number,
});

const activeTab = ref(0);

</script>
<template>
    <div class="aspect-frame">
        <div v-for="shape_category in data.shape_categories">
            <div class="shape-tab">
                <h2>
                    {{ shape_category.name }}
                </h2>
                <div>
                    <div v-for="shape in shape_category.shapes">
                        <img class="shape" alt="some image" :src="'/' + shape.filepath">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>


h2{
    font-size: 1.2rem;
}

.shape-tab{
    display: flex;
    flex-direction: column;

    > div{
        display: flex;
    }
}

.shape{
    width: 90;
    height: 90;
}
</style>
