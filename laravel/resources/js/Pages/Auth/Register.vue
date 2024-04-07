<script setup>
import InputGroup from '../../Components/Forms/InputGroup.vue';
import { Head, Link } from '@inertiajs/inertia-vue3'
</script>
<template>
    <!-- TODO: Решить вопрос с маской -->
    <!-- < vue - phone - input > </vue-phone-input> -->

    <Head :title="title" />
    <div class="form-box">
        <div class="form-value">
            <form action="{{ route('register') }}" method="post">
                <h2>Регистрация</h2>
                <InputGroup :id="username" :type="text" :name="username" :required="true"> Логин </InputGroup>
                <InputGroup :id="email" :type="email" :name="email" :required="true"> Почта </InputGroup>
                <InputGroup :id="phone" :type="text" :name="phone" :required="false"> Телефон </InputGroup>
                <InputGroup :id="password" :type="password" :name="password" :required="true"> Пароль </InputGroup>
                <InputGroup :id="password_confirmation" :type="password_confirmation" :name="password_confirmation"
                    :required="true"> Подтверждение пароля </InputGroup>
                <InputGroup :id="password" :type="password" :name="password" :required="true"> Пароль </InputGroup>
                <select name="gender" id="gender">
                    <option value="муж">муж</option>
                    <option value="жен">жен</option>
                </select>
                <!-- @error('gender') -->
                <div class="invalid-feedback">
                    Ошибка Гендера
                </div>
                <!-- @enderror -->

                <button type="submit">Зарегистрироваться</button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Register',
    created() {

    },
    data() {
        return {
        }
    },
    props: {
        title: String,
    },
    methods: {

    },
}
</script>

<style lang="scss" scoped>
</style>
