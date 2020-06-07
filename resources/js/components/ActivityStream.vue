<template>
    <ul class="activitystream">
      <li v-for="item in list">{{ item.user_name }} changed ...</li>
    </ul>
</template>

<script>
export default {
    data() {
        return {
            list: []
        };
    },
    props: ["blogid"],
    mounted() {
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
