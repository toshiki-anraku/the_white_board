require('./bootstrap');

//vue-router使用のため、モジュールvue-routerをimport
//※機能ごとにjsファイルを分ける→モジュール化

// import Vue from 'vue';
// import VueRouter from 'vue-router'; //vue-routerはインストール済み
// import router from './router/index' //
// import store from 'js/store'; //vuex使用のためstoreフォルダをインポート

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';


// window.Vue = Vue; // ？
// Vue.use(VueRouter); // Vue.js用のライブラリVueRouterを使用するのでVue.use

// /*--- Vueインスタンスの作成 ---*/

// // vueのオプションを記載する
// const app = new Vue({
//     el: '#app', //#appをマウント ※既存のDOM要素をVue.jsが生成するDOM要素で置き換えること
//     router //export default
    
//     // store,
//     // render: h => h(App)
//   });

// /*--- Vueインスタンスの作成 ---*/

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .mixin({ methods: { route } })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
