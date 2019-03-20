/**
 * @file app.js
 */
import Vue from "vue";
import axios from "axios";

import BlogEntryList from "./components/BlogEntryList";
import RelatedBlogEntryList from "./components/RelatedBlogEntryList";
import ProgressLoader from "./components/ProgressLoader";
import CategoryPaginator from "./components/CategoryPaginator";

Vue.prototype.http = axios;

Vue.component("blogentrylist", BlogEntryList);
Vue.component("relatedblogentrylist", RelatedBlogEntryList);
Vue.component("progress-loader", ProgressLoader);
Vue.component("category-paginator", CategoryPaginator);

const app = new Vue({
    el: "#app"
});
