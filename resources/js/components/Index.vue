<template>
    <div>
        <router-link :to="{name: 'note.index'}">Notes </router-link>
        <router-link :to="{name: 'note.create'}">Add </router-link>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: 'Index',
}
</script>

<style>
    
</style>