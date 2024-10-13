<template>
    <div>
        <CreateComponent></CreateComponent>

        <IndexComponent></IndexComponent>
    </div>
</template>

<script>
import CreateComponent from "./CreateComponent.vue";
import IndexComponent from "./IndexComponent.vue";

export default {
    components: {
        CreateComponent,
        IndexComponent,
    },
    
};
</script>
