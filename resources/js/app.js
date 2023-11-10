import "./bootstrap";
import "@protonemedia/laravel-splade/dist/style.css";
import "../css/app.css";
import {createPinia} from "pinia";
import Antd from 'ant-design-vue';
import {createApp} from "vue/dist/vue.esm-bundler.js";
import {renderSpladeApp, SpladePlugin} from "@protonemedia/laravel-splade";
import VueCountdown from '@chenfengyuan/vue-countdown';

const pinia = createPinia();
import VisaApplicationForm from './components/VisaApplicationForm.vue';
import PaypalCheckout from './components/PaypalCheckout.vue';
import GoogleLogin from './components/GoogleLogin.vue';
import Recaptcha from './components/Recaptcha.vue';
import {Swiper, SwiperSlide} from 'swiper/vue';
import VueTelInput from 'vue-tel-input';
import 'vue-tel-input/vue-tel-input.css';


// Import Swiper styles
import 'swiper/css';

const globalOptions = {
    mode: 'international',
    autoFormat: true,
    dropdownOptions: {
        showSearchBox: true
    },
};
const el = document.getElementById("app");
createApp({

    render: renderSpladeApp({el}),
}).use(SpladePlugin, {
    "max_keep_alive": 10,
    "transform_anchors": false,
    'progress_bar': {
        delay: 250,
        color: "#4B5563",
        css: true,
        spinner: true,
    },
    components: {
        VisaApplicationForm
        , PaypalCheckout
        , GoogleLogin
        , Swiper
        , SwiperSlide
        , Recaptcha
        , VueCountdown
    },
}).use(pinia).use(Antd)
    .use(VueTelInput, globalOptions)
    .mount(el)
