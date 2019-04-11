<template>
    <ul class="list-group">
        <li v-for="elemento in elementos" class="list-group-item">{{elemento}}</li>
    </ul>
</template>
<script>
    export default {
        props: [],
        data: function() {
            return {
                elementos : []
            };
        },
        mounted: function() {
            console.log( 'complemento cargado' );
            this.cargaDatos();
        },
        methods: {
            cargaDatos() {
                this.elementos = [ 'elem1' , 'elem2' , 'elem3' , 'elem4' ];
            }
        }
    }
</script>
