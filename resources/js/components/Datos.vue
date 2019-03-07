
<template>
    
    <div id="datos">
        {{datos}}
    </div>
    
</template>

<script>
    export default{
            data () {
                return {
                    datos : null
                };
            },
            mounted() {
                axios
                    .get( 'http://192.168.30.108/api/listadoContactos' )
                    .then( response => ( this.datos = response ) )
                    .catch( error => ( console.log( error ) ) );
            }
    }
</script>