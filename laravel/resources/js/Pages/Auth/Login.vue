<script setup>
import InputGroup from '../../Components/Forms/InputGroup.vue';
import { Head, Link } from '@inertiajs/inertia-vue3'
</script>
<template>

    <Head :title="title" />
    <div class="form-box">
        <div class="form-value">
            <form :action="route('login')" method="POST">
                <h2>Авторизация</h2>
                <InputGroup :id="email" :type="email" :name="email" :required="true"> Почта </InputGroup>
                <InputGroup :id="password" :type="password" :name="password" :required="true"> Пароль</InputGroup>
                <div class="forget">
                    <label for=""><input type="checkbox">Запомнить<a href="#">, забыли пароль?</a></label>
                </div>
                <button type="submit">Войти</button>
                <div class="register-box">
                    <p>
                        <Link :href="route('register')">Зарегистрироваться</Link>
                    </p>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Login',
    components: {
        Head,
        Link,
    },
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
.form-box {
    min-height: 450px;
    background: transparent;
    display: flex;
    justify-content: center;
    align-items: center;

    h2 {
        font-size: 2em;
        color: #0a0a0a;
        text-align: center;
    }

    select {
        margin: 30px 10px;
        font-size: 1em;
        border-radius: 15px;
        cursor: pointer;
    }

    * button {
        width: 100%;
        height: 40px;
        border-radius: 15px;
        background: $blue;
        border: none;
        outline: none;
        cursor: pointer;
        font-size: 1em;
        font-weight: 600;
    }
}

.forget {
    margin: -15px 0 15px;
    font-size: 0.9em;
    color: #0e0d0d;
    display: flex;
    justify-content: center;
}

.forget label input {
    margin-right: 3px;
}

.forget label a {
    color: #141313;
    text-decoration: none;
}

.forget label a:hover {
    text-decoration: underline;
}

.register-box {
    font-size: 0.9em;
    color: #f0e5e5;
    text-align: center;
    margin: 25px 0 10px;

    a {
        text-decoration: none;
        color: #050505;
        font-weight: 600;

        &:hover {
            text-decoration: underline;
        }
    }
}
</style>
