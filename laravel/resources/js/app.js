import {createApp} from "vue/dist/vue.esm-bundler.js";
import Hello from "./src/components/Hello.vue";
const app = createApp({});

app.component('hello', Hello)
app.mount("#app");

