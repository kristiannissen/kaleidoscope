/**
 * @file CategoryPaginator.vue
 */

<template>
    <ul class="mdl-list">
        <li class="mdl-list__item" v-for="item in formattedList">
            <span class="mdl-list__item-primary-content">
                <span>
                    <a v-bind:href="item.slug">{{ item.title }}</a>
                </span>
                <span class="mdl-list__item-text-body">
                </span>
            </span>
        </li>
        <li>
            <a href="#" class="mdl-badge" data-badge="50">Showing 1-5</a>
        </li>
    </ul>
</template>

<script>
export default {
    props: {
        initialid: String    
    },
    data() {
        return {
            list: [],
            id: this.initialid
        };
    },
    computed: {
        formattedList: function () {
            return this.list.map(function (item) {
                return {
                    'slug': '/post/'+ item.slug,
                    'title': item.title
                }    
            });    
        }
    },
    methods: {
        fetchBlogEntryList: function(id) {
            var endPoint = "/api/category/"+ id +"/";
            this.http
                .get(endPoint)
                .then(response => (this.list = response.data.data))
                .catch(response => console.log(response));
        }
    },
    mounted() {
        console.log("Mounted");
    },
    created() {
        this.fetchBlogEntryList(this.id);
        console.log("Created");
    }
};
</script>
