<template>
    <header class="flex-c">
        <div>
            <nav>
                <ul>
                    <li><x-link>Домой</x-link></li>
                    <li><x-link>Контакты</x-link></li>
                </ul>

                <!-- TODO: Удалить, временный блок -->
                <!-- @if ($user = auth()->user())
                <div style="display: flex;" class="flex-c"> Пользователь:{{ " $user->firstname $user->lastname " }}
                </div>
                @endif -->

                <ul class="auth-ul">

                    <li>
                        <!-- TODO: Добавить разные роуты -->
                        <x-link route='login'>Личный кабинет</x-link>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
</template>

<script>
export default {
    name: 'Header',
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
