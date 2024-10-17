<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">{{ this.name }}</h3>
                        <p class="card-text">{{ this.content }}</p>

                        <router-link 
                            to="/notes" 
                            class="btn btn-primary mt-3">
                            Back to Notes
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import NoteMixin from '../../mixins/Note/NoteMixin';
import NoteGetMixin from '../../mixins/Note/GetNoteMixin';

export default {
    mixins: [NoteMixin, NoteGetMixin],
}
</script>

<style></style>