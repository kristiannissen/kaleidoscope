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

let interV = setInterval(() => {
    if (document.querySelectorAll('a[href]').length > 0) {
        let nodes = document.querySelectorAll('a[href]');
        nodes.forEach((node) => {
            node.addEventListener('click', (event) => {
            })
        })
    }
}, 100);
