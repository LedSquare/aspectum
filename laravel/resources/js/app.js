import {createApp} from "vue/dist/vue.esm-bundler.js";
import PhoneInput from './src/components/form/PhoneInput.vue';
import VueMask  from 'v-mask';

const app = createApp({
    VueMask,
});

// app.use(VueMask);
app.component('vue-phone-input', PhoneInput);
app.mount("#app");

