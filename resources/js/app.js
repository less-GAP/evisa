import "./bootstrap";
import "@protonemedia/laravel-splade/dist/style.css";
import "../css/app.css";
import {createPinia} from "pinia";
import Antd from 'ant-design-vue';
import {createApp} from "vue/dist/vue.esm-bundler.js";
import {renderSpladeApp, SpladePlugin} from "@protonemedia/laravel-splade";

const pinia = createPinia();
import VisaApplicationForm from './components/VisaApplicationForm.vue';
import PaypalCheckout from './components/PaypalCheckout.vue';
import {Swiper, SwiperSlide} from 'swiper/vue';



// Import Swiper styles
import 'swiper/css';

const el = document.getElementById("app");
createApp({

    render: renderSpladeApp({el}),
}).use(SpladePlugin, {
    "max_keep_alive": 10,
    "transform_anchors": false,
    "progress_bar": true,
    components: {
        VisaApplicationForm
        , PaypalCheckout
        , Swiper
        , SwiperSlide
    },
}).use(pinia).use(Antd)
    .mount(el)
