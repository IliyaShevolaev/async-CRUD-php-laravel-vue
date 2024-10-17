export default {
    data() {
        return {
            id: null,
            name: null,
            content: null
        }
    },

    mounted() {
        this.id = this.$route.params.id;
        this.getNote();
    },
}