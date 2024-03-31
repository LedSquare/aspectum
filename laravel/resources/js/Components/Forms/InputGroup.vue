<script setup>
</script>
<template>
    <div class="input-group">
        <label :class="[required ? 'input-is-required' : '']" :for="id">
            <slot />
        </label>
        <input :id="id" :type="type" :name="name" class="form-input">
        <!-- @error($name) -->
        <div class="invalid-feedback">
            <!-- {{ message }} -->
        </div>
    </div>


</template>

<script>
export default {
    name: 'InputGroup',
    created() {

    },
    data() {
        return {
        }
    },
    props: {
        id: String,
        type: String,
        name: String,
        required: {
            type: Boolean,
            required: false,
            default: false,
        }
    },
    methods: {

    },
}
</script>

<style lang="scss" scoped>
.input-group {
    position: relative;
    margin: 30px 0;
    width: 310px;
    border-bottom: 2px solid $blue;

    /* (полосочки) */
    input {
        width: 100%;
        height: 30px;
        background: transparent;
        border: none;
        outline: none;
        font-size: 1em;
        padding: 0 35px 0 5px;
        color: #0f0e0e;

        &:invalid {
            color: #af3333;
        }
    }

    label {
        transform: translateY(-50%);
        color: #131111;
        font-size: 1em;
        pointer-events: none;
    }

    ion-icon {
        position: absolute;
        right: 8px;
        color: #0e0d0d;
        font-size: 1.2em;
        top: 20px;
    }

    .invalid-feedback {
        color: #af3333;
    }

    .input-is-required::after {
        color: #af3333;
        content: " *";
    }
}
</style>
