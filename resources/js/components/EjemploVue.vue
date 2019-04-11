<template>
    <select class="custom-select" v-on:change="reportaCambio">
        <option v-for="opcion in opciones">{{opcion.texto}}</option>
    </select>
</template>

<script>
    export default{
        props: [],
        data: function() {
            return {
                opciones : []
            };
        },
        mounted: function() {
            this.llenaOpciones();
        },
        methods: {
            llenaOpciones() {
                  this.opciones = [
                    { opcion:'1',texto:'Mi valor 1'}, 
                    { opcion:'2',texto:'Mi valor 2'},
                    { opcion:'3',texto:'Mi valor 3'},
                    { opcion:'4',texto:'Mi valor 4'} 
                ];
            },
            reportaCambio() {
                console.log("cambio de valor..");
            }
        }
    }
</script>
