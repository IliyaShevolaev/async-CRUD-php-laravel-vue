<template>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="mb-3">
                    <input
                        v-model="name"
                        type="text"
                        class="form-control"
                        id="name"
                        placeholder="Name"
                    />
                </div>
                <div class="mb-3">
                    <textarea
                        v-model="content"
                        class="form-control"
                        id="content"
                        rows="3"
                        placeholder="Enter your content here..."
                    ></textarea>
                </div>
                <div class="text-center">
                    <button
                        @click.prevent="addNote()"
                        type="submit"
                        class="btn btn-primary"
                    >
                        Добавить
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CreateComponent",

    data() {
        return {
            name: null,
            content: null,
        };
    },

    methods: {
        addNote() {
            axios
                .post("/api/notes/store", {
                    name: this.name,
                    content: this.content,
                })
                .then((result) => {
                    console.log(result);
                    this.name = null;
                    this.content = null;
                    
                    this.$parent.$refs.index.getNotes();
                });
        },
    },
};
</script>

<style></style>
