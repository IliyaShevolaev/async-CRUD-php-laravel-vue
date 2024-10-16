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
                    <div class="d-grid">
                        <button @click.prevent="store()" class="btn btn-secondary" :disabled="isDisabled">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </template>

<script>
import axios from 'axios';

export default {
    name: 'NoteIndexComponent', 

    data() {
        return {
            name: null,
            content: null,
        }
    },

    methods: {
        store() {
            axios.post('/api/notes/store', {
                name: this.name,
                content: this.content,
            }).then((result) => {
                console.log(result);
                this.$router.push({ name: 'note.index' });
            });
        }
    },

    computed: {
        isDisabled() {
            return !(this.name && this.content);
        }
    },
}
</script>

<style>

</style>