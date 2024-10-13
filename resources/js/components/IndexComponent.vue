<template>
    <div v-for="note in notes" class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ note.name }}</h5>

                        <p class="card-text text-center">
                            {{ note.content }}
                        </p>
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

<style></style>
