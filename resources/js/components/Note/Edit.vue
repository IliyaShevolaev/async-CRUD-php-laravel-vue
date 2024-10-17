<template>
    <div>
        <div>
            <div class="form-container">
                <div class="note-form">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" v-model="name" class="form-control" id="name" placeholder="Enter name">
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Note</label>
                        <textarea class="form-control" v-model="content" id="content" rows="6"
                            placeholder="Enter note..."></textarea>
                    </div>
                    <div class="d-grid">
                        <button @click.prevent="updateNote()" class="btn btn-secondary" :disabled="isDisabled">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import mixin from '../../mixins/Note/NoteMixin';
import NoteGetMixin from '../../mixins/Note/GetNoteMixin';

export default {
    mixins: [mixin, NoteGetMixin],

    computed: {
        isDisabled() {
            return !(this.name && this.content);
        }
    },

    components: {
        Create: () => import('./Create.vue'),
    },
    
}
</script>

<style>
</style>