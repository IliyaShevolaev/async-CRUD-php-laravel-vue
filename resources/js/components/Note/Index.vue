<template>
    <div>
        Notes Index
    </div>
</template>

<script>
import axios from 'axios';

export default {
    mounted() {
        axios.get('api/notes/index').then((res) => console.log(res));
    },
}
</script>

<style>
    
</style>