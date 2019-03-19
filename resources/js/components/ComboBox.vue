<template>
    <select class="custom-select custom-select-sm" v-bind:id="nombreSelect" v-bind:name="nombreSelect">
        <option v-for="item in items" v-bind:value="item.id">{{item.nombre}}</option>
    </select>
</template>
<script>
    export default{
        props: [ 'idCat' , 'nombreSelect' ],
        data: function() {
            return {
                items : []
            };
        },
        mounted: function(){
            this.datosCombo( this.idCat );
        },
        methods: {
            datosCombo( id ) {
                axios( '/api/opcionesCombos/' + id )
                    .then( datos => { 
                        this.items = datos.data; 
                    })
                    .catch( err => console.error(err) );
            }
        }
    }
</script>