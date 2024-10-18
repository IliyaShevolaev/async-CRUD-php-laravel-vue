export default {
    data() {
        return {
            id: null,
            name: null,
            content: null,
            image_url: null,
        }
    },

    mounted() {
        this.id = this.$route.params.id;
        this.getNote();
    },
}