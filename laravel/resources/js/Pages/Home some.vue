<script setup>
import { ref } from 'vue';

const posts = [
    { id: 1, title: 'SomePost', body: 'Описание поста' },
    { id: 2, title: 'SomePost', body: 'Описание поста2' },
    { id: 3, title: 'SomePost', body: 'Описание поста3' },
    { id: 4, title: 'SomePost', body: 'Описание поста4' },
]
const addedPosts = ref([])

function add(post) {
    addedPosts.value.push(post)
}
</script>
<template>
    <div style="flex-direction: column;">

        <div @click="add(post)" class="post" v-for="post in posts">
            <div><strong>Название:</strong>{{ post.title }}</div>
            <div><strong>Описание:</strong>{{ post.body }}</div>
        </div>
    </div>
    <div style="flex-direction: column;">
        <div v-for="post in addedPosts">
            <div>{{ post.id }}</div>
            <div>{{ post.title }}</div>
            <div>{{ post.body }}</div>
        </div>
    </div>

</template>

<style lang="scss" scoped>
.post {
    margin: 0.3em;
    padding: 1em;
    display: flex;
    flex-direction: column;
    border: 3px solid greenyellow;
}
</style>
