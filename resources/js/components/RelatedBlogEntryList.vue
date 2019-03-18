/**
 * @file RelatedBlogEntryList
 */
<template>
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--3-col" v-for="item in slicedList">
            <h3>
                <a v-bind:href="item.slug">{{ item.title }}</a>
            </h3>
        </div> 
    </div>
</template>

<script>
    export default {
        created() {
            this.fetchList(this.id)
            console.log('Related created')    
        },
        props: {
            initialid: String    
        },
        data() {
            return {
                id: this.initialid,
                list: []
            }    
        },
        computed: {
            slicedList: function () {
                return this.list.slice(0, 4)
            }
        },
        methods: {
            fetchList: function(id) {
                var endPoint = '/api/blogentries/'+ id +'/related/';
                this.http.get(endPoint)
                    .then((response) => this.list = response.data.data)
                    .catch((response) => console.log(response))
            }    
        }
    }
</script>
