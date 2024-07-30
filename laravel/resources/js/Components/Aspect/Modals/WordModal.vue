<template>
    <transition name="modal-animation">
        <div v-show="modalSwitch" class="word-modal">
            <div class="word-with-arrows">
                <div @click="rightRollColor(rollIndex, word, data.colors)" class="arrow">
                    &#8249
                </div>
                <div :style="['color: ' + word?.colorCode]">
                    {{ word?.name }}
                </div>
                <div class="arrow">
                    &#8250
                </div>
            </div>
        </div>
    </transition>
</template>
<script setup>

const props = defineProps({
    modalSwitch: Boolean,
    colors: Array,
    word: { type: Object || null, required: false },
})

</script>
<style lang="scss" scoped>
.modal-animation-enter-active,
.modal-animation-leave-active {
    transition: opacity 0.3s cubic-bezier(0.52, 0.02, 0.19, 1.02);
}

.modal-animation-enter-from,
.modal-animation-leave-to {
    opacity: 0;
}


.word-with-arrows {
    cursor: pointer;
    width: 100%;
    display: flex;
    justify-content: space-between;
    transition: 0.2s ease-in-out;

    >.arrow {
        font-size: 25px;
        margin: 0px 10px;
    }
}

.word-modal {
    position: fixed;
    width: ;
}
</style>
