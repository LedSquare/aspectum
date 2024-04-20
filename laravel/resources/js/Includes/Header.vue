<script setup>
import { Link } from "@inertiajs/inertia-vue3"
</script>
<template>
    <header class="flex-c">
        <div>
            <nav>
                <ul>
                    <li>
                        <Link :href="route('home')">Домой</Link>
                    </li>
                    <li>
                        <a>Контакты</a>
                    </li>
                </ul>

                <!-- TODO: Удалить, временный блок -->
                <!-- @if ($user = auth()->user())
                <div style="display: flex;" class="flex-c"> Пользователь:{{ " $user->firstname $user->lastname " }}
                </div>
                @endif -->

                <ul class="auth-ul">

                    <li>
                        <Link :href="route('logout')" method="post">Выйти</Link>
                    </li>
                    <li>
                        <Link :href="route('login')">Личный кабинет</Link>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
</template>

<script>
export default {
    name: 'Header',
    components: {
        Link
    },
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
header {
    padding: 0px 10px;
    display: flex;
    background-color: $body-background;
    height: $header-footer-height;

    >div {
        display: flex;
        width: 1180;
        height: 100%;
        padding: 0px 10px;
        border-radius: 10px;
        background-color: $blocks-background;
    }

    nav {
        justify-content: space-between;
    }

    ul>li:first-child {
        margin-right: 5em;
    }

    .auth-ul>li {
        margin-right: 10px !important;
    }

    ul {
        display: flex;
        justify-content: space-evenly;
        align-items: center;

        >li {
            margin: 10px;
        }
    }
}
</style>
