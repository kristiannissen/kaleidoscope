/**
 * @file app.js
 */
import Vue from 'vue'
import axios from 'axios'

import BlogEntryList from './components/BlogEntryList'
import RelatedBlogEntryList from './components/RelatedBlogEntryList'

Vue.prototype.http = axios

Vue.component('blogentrylist', BlogEntryList)
Vue.component('relatedblogentrylist', RelatedBlogEntryList)

const app = new Vue({
    el: '#app'
});
