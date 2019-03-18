/**
 * @file app.js
 */
import Vue from 'vue'
import axios from 'axios'

import BlogEntryList from './components/BlogEntryList'

Vue.prototype.http = axios

Vue.component('blogentrylist', BlogEntryList)

const app = new Vue({
    el: '#app'
});
