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
                        <button @click.prevent="store()" class="btn btn-secondary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </template>

<script>
import axios from 'axios';
import router from '../../router';

export default {
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
                router.push({name: 'note.index'});
            });
        }
    },
}
</script>

<style scoped>
.form-container {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    height: 100%;
    padding: 20px;
    box-sizing: border-box;
}

.note-form {
    display: flex;
    flex-direction: column;
    width: 100%;
    max-width: 600px;
    height: 100%;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    box-sizing: border-box;
}

.form-label {
    font-weight: bold;
}

.form-control {
    border-radius: 8px;
    box-shadow: none;
}

.form-control:focus {
    border-color: #042b4e;
    box-shadow: none;
}

#content {
    flex-grow: 1;
    min-height: 400px;
}
</style>