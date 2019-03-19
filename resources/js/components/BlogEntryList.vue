/**
 * @file BlogEntryList.vue
 */
<template>
<div class="blogentrylist mdl-grid">
    <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col" v-for="item in entryList">
        <div class="mdl-card__title">
            <h1>
                <a v-bind:href="item.slug">{{item.title}}</a>
            </h1>
        </div>
        <div class="mdl-card__supporting-text">
            <p>{{item.content}}</p>
        </div>
        <div class="mdl-card__actions actions mdl-card--border">
            <span>Created: <time v-bind:datetime="item.dateTime">
                {{item.created}}</time></span>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            list: [],
            title: ""
        };
    },
    computed: {
        entryList: function() {
            var list = this.list.slice(0, 10);
            return list.map(function(item) {
                var date = new Date(item.created);
                return {
                    title: item.title,
                    created: date.toLocaleDateString(
                        navigator.language || "da-DK",
                        {
                            weekday: "long",
                            month: "long",
                            year: "numeric",
                            day: "numeric"
                        }
                    ),
                    slug: item.slug,
                    content: item.content,
                    dateTime: [
                        date.getFullYear(),
                        date.getMonth() < 10
                            ? "0" + date.getMonth()
                            : date.getMonth(),
                        date.getDate()
                    ].join("-")
                };
            });
        }
    },
    methods: {
        fetchBlogEntryList: function() {
            var endPoint = "/api/blogentries/";
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
        this.fetchBlogEntryList();
        console.log("Created");
    }
};
</script>
