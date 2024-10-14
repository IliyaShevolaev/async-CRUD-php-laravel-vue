<template>
    <div v-for="(note, index) in notes" :key="note.id" class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mb-4 position-relative">
                    <div class="card-body">

                        <a href="#" class="delete-link">Delete</a>
                        <a href="#" @click.prevent="changeEditId(note.id)" :class="isEditing(note.id) ? 'd-none' : ''"
                            class="edit-link">Edit</a>
                        <a href="#" @click.prevent="updateNote(note.id)" :class="isEditing(note.id) ? '' : 'd-none'"
                            class="edit-link">Update</a>

                        <h5 type="text" :class="isEditing(note.id) ? 'd-none' : ''" class="card-title text-center">
                            {{note.name }}</h5>
                        <input v-model="editNote.name" type="text" :class="isEditing(note.id) ? '' : 'd-none'"
                            class="form-control m-3" style="max-width: 40%;" placeholder="Name" />

                        <div class="d-flex justify-content-between align-items-center">
                            <p class="card-text text-center mb-0" style="max-width: 100%; word-wrap: break-word;">
                            <div :class="isEditing(note.id) ? 'd-none' : ''">{{ note.content }}</div>

                            <textarea v-model="editNote.content" :class="isEditing(note.id) ? '' : 'd-none'"
                                class="form-control" cols="100" rows="3"
                                placeholder="Enter your content here..."></textarea>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "IndexComponent",

    data() {
        return {
            notes: [],
            editNoteId: null,

            editNote: {
                name: '',
                content: '',
            }
        };
    },

    mounted() {
        this.getNotes();
    },

    methods: {
        getNotes() {
            axios.get("api/notes/index").then((result) => {
                this.notes = result.data;
            });
        },

        changeEditId(id) {
            const note = this.notes.find(n => n.id === id);
            this.editNoteId = id;
            this.editNote = { ...note }; 
        },

        isEditing(id) {
            return this.editNoteId === id;
        },

        updateNote(id) {
            axios.patch(`/api/notes/update/${id}`, {
                name: this.editNote.name,
                content: this.editNote.content,
            }).then((result) => {
                this.getNotes(); 
                this.editNoteId = null;
            });
        }
    },
};
</script>

<style scoped>
.delete-link {
    position: absolute;
    top: 10px;
    left: 10px;
}

.edit-link {
    position: absolute;
    top: 10px;
    right: 10px;
}
</style>
