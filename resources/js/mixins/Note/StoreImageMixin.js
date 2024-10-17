import Dropzone from "dropzone";

export default {
    mounted() {
        this.dropzone = new Dropzone(this.$refs.dropezoneId, {
            url: '#',
            autoProcessQueue: false,
            maxFiles: 1,
            addRemoveLinks: true
        });
    },

    methods: {
        storeNote() {
            const formData = new FormData();
            formData.append('name', this.name);
            formData.append('content', this.content);
    
            if (this.dropzone.files.length > 0) {
                formData.append('image', this.dropzone.files[0]);
            }

            console.log(this.dropzone.files);
    
            axios.post('/api/notes/store', formData).then((result) => {
                this.$router.push({ name: 'note.index' });
            });
        },
    },
}