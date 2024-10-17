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
export default {
    data() {
        return {
            id: null,
            name: null,
            content: null
        }
    },

    mounted() {
        this.id = this.$route.params.id;
        this.getNote();
    },

    methods: {
        getNote() {
            axios.get(`/api/notes/show/${this.id}`)
                .then((result) => {
                    this.name = result.data.data.name;
                    this.content = result.data.data.content;
                });
        }
    },
}
</script>

<style></style>