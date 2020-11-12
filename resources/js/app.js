/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./lib/gamepad.js');
require('@fortawesome/fontawesome-free');

window.Vue = require('vue');
import Vuex from 'vuex';
import Clipboard from 'v-clipboard';

Vue.use(Vuex);
Vue.use(Clipboard);

Vue.component('mission', require('./components/Mission.vue').default);
Vue.component('game', require('./components/Game.vue').default);
Vue.component('answer-inputer', require('./components/admin/AnswersInputer.vue').default);
Vue.component('suggester', require('./components/admin/Suggester').default);

const store = new Vuex.Store({
    state: {
        currentMission: 0,
        stop: false,
        sound: true,
    },

    mutations: {
        start(state) {
            state.stop = false;
        },

        stop(state) {
            state.stop = true;
        },

        nextMission(state) {
            state.currentMission++;
        },

        reset(state) {
            state.currentMission = 0;
            state.stop = false;
        },

        toggleSound(state) {
            state.sound = !state.sound;
        }
    }
});

const app = new Vue({
    el: '#app',
    store: store
});
