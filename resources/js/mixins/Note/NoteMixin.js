export default {
    methods: {
        getNote() {
            axios.get(`/api/notes/show/${this.id}`)
                .then((result) => {
                    this.name = result.data.data.name;
                    this.content = result.data.data.content;
                    this.image_url = result.data.data.image_url;
                });
        },

        updateNote() {
            axios.patch(`/api/notes/update/${this.id}`, {
                name: this.name,
                content: this.content,
            }).then((result) => {
                this.$router.push({name: 'note.index'});
            });
        },

        getNotes() {
            axios.get('/api/notes/index')
                .then((result) => {
                    this.notes = result.data.data;
                });
        },

        deleteNote(id) {
            axios.delete(`/api/notes/destroy/${id}`).then((result) => {this.getNotes();});
        }
    },
}