<script setup>
import TelegramIcon from '../Components/svg/icons/socials/TelegramIcon.vue';

</script>
<template>
    <footer class="flex-c">
        <div class="footer-container">
            <div class="contacs">
                <a target="_blank" href="https://t.me/Ilari29">
                    <telegram-icon />
                </a>
            </div>
            <hr>
            <div class="policies">
                <p class="polici-text">Продолжая использовать сайт, вы соглашаетесь на использование файлов cookie
                </p>
                <p class="polici-text">©2024 - Все права защищены</p>
            </div>
        </div>
    </footer>
</template>

<style lang="scss" scoped>


.polici-text {
    color: gray;
}

footer {
    padding-left: 10px;
    padding-right: 10px;
    padding-bottom: 28px;
    display: flex;
    background-color: $body-background;
    height: 165px;
    flex-shrink: 0;



    .footer-container {
        display: flex;
        flex-direction: column;
        width: 1180;
        height: 100%;
        padding: 10px 15px;
        border-radius: 24px;
        font-size: 12px;
        background-color: $blocks-background;
        justify-content: space-between;

        .contacs {
            font-weight: bold;
            display: flex;
            margin-top: 10px;
        }

        .policies{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
    }


}
</style>
