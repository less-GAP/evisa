import "./bootstrap";
import "../css/app.css";
import "@protonemedia/laravel-splade/dist/style.css";
import { createPinia } from "pinia";

import { createApp } from "vue/dist/vue.esm-bundler.js";
import { renderSpladeApp, SpladePlugin } from "@protonemedia/laravel-splade";
const pinia = createPinia();

const el = document.getElementById("app");
const app = createApp({
    render: renderSpladeApp({ el }),
}).use(SpladePlugin, {
    'max_keep_alive': 50,
}).use(pinia)
    .mount(el)
