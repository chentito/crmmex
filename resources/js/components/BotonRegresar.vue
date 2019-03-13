<template>
    <button class="btn btn-sm btn-outline-accent float-left" v-on:click="regresar"><i class="material-icons">keyboard_return</i> Regresar</button>
</template>

<script>
    export default{
        methods: {
            regresar: function() {
                history.back();
            }
        }
    }
</script>