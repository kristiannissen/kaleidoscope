<template>
    <div class="activitystream">
        <ul class="event-list">
            <li v-for="item in eventList" class="event-item">
                <i class="material-icons">event</i> {{ item.date }}
                <b>{{ item.user }}</b> changed {{ item.model }}
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            list: []
        };
    },
    props: ["blogid"],
    mounted() {},
    computed: {
        eventList() {
            return this.list.map(item => {
                let model = JSON.parse(item.data);
                let date = new Date(
                    Date.parse(item.created_at)
                ).toLocaleDateString(navigator.language || "en-US", {
                    weekday: "short",
                    month: "short",
                    year: "numeric",
                    day: "numeric"
                });
                return {
                    date,
                    user: item.user_name,
                    model: Object.keys(model)
                        .filter(k =>
                            [
                                "content",
                                "title",
                                "excerpt",
                                "online",
                                "theme_image"
                            ].includes(k)
                        )
                        .join(", ")
                };
            });
        }
    },
    methods: {
        fetchStream() {
            let endPoint = `/api/activity/${this.blogid}`;
            this.http
                .get(endPoint)
                .then(response => (this.list = response.data.data));
        }
    },
    created() {
        this.fetchStream();
    }
};
</script>

<style scoped>
.event-list {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
.event-item {
    margin-left: 25px;
}
.event-item > i {
    position: relative;
    margin-left: -28px;
    top: 10px;
}
</style>
