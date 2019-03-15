/**
 * @file BlogEntryList.vue
 */
<template>
<div>
    <div class="mdl-card mdl-cell mdl-cell--8-col" v-for="item in list">
        <div class="mdl-card__title">
            <h3>{{item.title}}</h3>
        </div>
        <div class="mdl-card__supporting-text">
            {{item.content}}
        </div>
        <div class="mdl-card__supporting-text">meta</div>
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
