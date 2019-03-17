/**
 * @file BlogEntryList.vue
 */
<template>
<div class="blogentrylist mdl-grid">
    <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col" v-for="item in list">
        <div class="mdl-card__title">
            <h3>
                <a v-bind:href="item.slug">{{item.title}}</a>
            </h3>
        </div>
        <div class="mdl-card__supporting-text">
            {{item.content}}
        </div>
        <div class="mdl-card__actions actions mdl-card--border">
            <span>Created: {{item.created}}</span>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        data() {
            return { 
                list: [],
                title: ''
            }
        },
        methods: {
            fetchBlogEntryList: function () {
                var endPoint = '/api/blogentries/'
                this.http.get(endPoint)
                .then((response) => this.list = response.data.data)
            }
        },
        mounted() {
            console.log('Mounted')
        },
        created(){
            this.fetchBlogEntryList()
            console.log('Created')
        }
    };
</script>
