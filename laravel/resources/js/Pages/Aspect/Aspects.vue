<script setup>
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    title: String,
    resource: {type: [Array, Object], required: true},
})
</script>

<template>
    <div class="aspect-list-contrainer">
        <Head :title="title"/>
        <div class="aspects" v-if="resource.data.length !== 0">
        <table class="">
            <thead>
                <tr>
                    <th>id</th>
                    <th>user_id</th>
                    <th>created</th>
                    <th>updated</th>
                    <th>ended</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="aspect in resource.data" :key="aspect.id">
                    <td>{{ aspect.id }}</td>
                    <td>{{ aspect.user_id }}</td>
                    <td>{{ aspect.created_at }}</td>
                    <td>{{ aspect.updated_at }}</td>
                    <td>{{ aspect.isEnded }}</td>
                    {{ console.log(aspect) }}
                </tr>
            </tbody>
        </table>
        </div>
        <div v-else class="empty">
            <h2>
                В данный момент у вас нет истории обликов
            </h2>
        </div>
    </div>
</template>


<style lang="scss" scoped>
.empty{
    width: 100%;
    height: 70vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.aspects{
    display: flex;
    min-height: 50vh;
    width: 99%;
}

table{
    width: 100%;
    height: fit-content;
}
tr{
    height: 40px
};
td, th{
    border: 3px solid white;
    background: $body-background;
}
th{
    background: $blue;
}

</style>
