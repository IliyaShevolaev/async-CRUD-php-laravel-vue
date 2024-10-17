<template>
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

                <div ref="dropezoneId" class="btn dropzone mb-3">
                    <div class="dz-message">Upload note image</div>
                </div>

                <div class="d-grid">
                    <button @click.prevent="storeNote()" class="btn btn-secondary" :disabled="isDisabled">Save</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import mixin from '../../mixins/Note/StoreImageMixin';
import Dropzone from 'dropzone';

export default {
    mixins: [mixin],

    name: 'NoteIndexComponent',

    data() {
        return {
            name: null,
            content: null,
            dropzone: null
        }
    },

    computed: {
        isDisabled() {
            return !(this.name && this.content);
        }
    },
}
</script>

<style></style>