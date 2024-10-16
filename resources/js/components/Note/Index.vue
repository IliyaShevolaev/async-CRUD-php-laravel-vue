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
import axios from 'axios';

export default {
    mounted() {
        this.getNotes();
    },

    data() {
        return {
            notes: null,
        }
    },

    methods: {
        getNotes() {
            axios.get('/api/notes/index')
                .then((result) => {
                    this.notes = result.data;
                });
        }
    },
}
</script>

<style></style>