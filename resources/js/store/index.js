import Vue from 'vue';
import Vuex from 'vuex';
import * as actions from 'js/store/actions';
import * as getters from 'js/store/getters';
import { state, mutations } from 'js/store/mutations';

Vue.use(Vuex);

export default new Vuex.Store({
  actions,
  getters,
  state,
  mutations
});