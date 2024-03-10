<script setup>

</script>
<template>
    <div class="input-group">
        <label for="phone">Телефон</label>
        <input
            id="phone"
            type="text"
            name="phone"
            class="form-input"
            v-mask="'#-#-#'"
        >

    </div>
</template>

<script>
export default {
  name: 'PhoneInput',
  created() {

  },
  data() {
    return {
    }
  },
  props: {
  },
  methods: {
  },
}
</script>

<style lang="scss" scoped>

</style>

