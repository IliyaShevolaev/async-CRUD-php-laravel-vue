<template>
    <div v-for="note in notes" class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mb-4 position-relative">
                    <div class="card-body">

                        <a href="#" class="edit-link">Edit</a>
                        <a href="#" class="delete-link">Delete</a>

                        <h5 class="card-title text-center">{{ note.name }}</h5>

                        <div class="d-flex justify-content-between align-items-center">

                            <p class="card-text text-center mb-0" style="max-width: 100%; word-wrap: break-word;">
                                {{ note.content }}
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "IndexComponent",

    data() {
        return {
            notes: null,
        };
    },

    mounted() {
        this.getNotes();
    },

    methods: {
        getNotes() {
            axios.get("api/notes/index").then((result) => {
                this.notes = result.data;
                console.log(result.data);
            });
        },
    },
};
</script>

<style scoped>
.edit-link {
    position: absolute;
    top: 10px;
    left: 10px;
}

.delete-link {
    position: absolute;
    top: 10px;
    right: 10px;
}
</style>
