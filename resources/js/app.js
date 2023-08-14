import "./bootstrap";
import "../css/app.css";
import "@protonemedia/laravel-splade/dist/style.css";
import { createPinia } from "pinia";
import Antd from 'ant-design-vue';
import { createApp } from "vue/dist/vue.esm-bundler.js";
import { renderSpladeApp, SpladePlugin } from "@protonemedia/laravel-splade";
const pinia = createPinia();
import VisaApplicationForm from './components/VisaApplicationForm.vue';
const el = document.getElementById("app");
const app = createApp({
    render: renderSpladeApp({ el }),
}).use(SpladePlugin, {
    'max_keep_alive': 50,
    'transform_anchors': true,
}).use(pinia).use(Antd)
    .component('VisaApplicationForm', VisaApplicationForm)
    .mount(el)
