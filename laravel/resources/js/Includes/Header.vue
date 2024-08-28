<script setup>
import { Link } from "@inertiajs/vue3"
import ProfileIcon from '../Components/svg/icons/ProfileIcon.vue'
import HomeIcon from '../Components/svg/icons/HomeIcon.vue'

</script>
<template>
    <header class="flex-c">
        <div>
            <nav>
                <ul>
                    <img class="logo-mini" src="../../../public/images/asp-small-logo.png" alt="Нет картинки">
                    <div class="name">
                        <p>ОБЛИК</p>
                    </div>
                </ul>
                <ul>
                    <li>
                        <Link :href="route('home')">
                        Главная
                        <!-- if width is small <home-icon /> -->
                        </Link>
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
                        <Link :href="route('login')">
                        <profile-icon />
                        </Link>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
</template>


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


    .auth-ul>li {
        margin-right: 10px !important;
    }

    ul {
        display: flex;
        justify-content: space-evenly;
        align-items: center;

        >li {
            margin: 20px;
        }
    }
}

.name {
    display: flex;
    flex-direction: column-reverse;
    height: 80%;

    >p {
        color: $blue-gray-hover;
        font-weight: bolder;
    }
}

.logo-mini {
    width: 95px;
    height: 65px;
}
</style>
