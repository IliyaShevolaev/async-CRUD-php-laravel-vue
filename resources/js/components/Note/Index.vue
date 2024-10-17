<template>
    <div v-for="note in notes" class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mb-4 position-relative">
                    <div class="card-body">
                        <router-link :to="{name: 'note.show', params: {id: note.id}}">
                            <h5 class="card-title text-center">{{ note.name }}</h5>
                        </router-link>
                        <p class="card-text text-center">{{ note.content }}</p>

                        <a href="#" class="position-absolute top-0 start-0 mt-2 ms-2 text-decoration-none text-danger"
                            @click.prevent="deleteNote(note.id)">
                            Delete
                        </a>
                        <a href="#" class="position-absolute top-0 end-0 mt-2 me-2 text-decoration-none text-primary">
                            <router-link :to="{name: 'note.edit', params: {id: note.id}}">Edit</router-link>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import mixin from '../../mixins/Note/NoteMixin';

export default {
    mixins: [mixin],

    mounted() {
        this.getNotes();
    },

    data() {
        return {
            notes: null,
        }
    },
}
</script>

<style></style>