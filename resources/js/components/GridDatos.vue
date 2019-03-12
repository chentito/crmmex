<template>
    <div class="container">
        <h4>{{titulo}}</h4>
        <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th v-for="col in colNames">{{col}}</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <th v-for="col in colNames">{{col}}</th>
                </tr>
            </tfoot>
        </table>
    </div>
</template>

<script>
    
</script>

<script>
    export default {
        props:[ 'nombreGrid' , 'titulo' , 'url' , 'colNames' , 'colIds'  ],
        mounted() {
            const colIds = this.colIds;
            axios( this.url )
                .then( function( response ) {
                    $(document).ready(function() {
             
                        var table = $('#example').DataTable({
                            responsive: true,
                            data      : response.data,
                            columns   : [
                                { data: 'id' },
                                { data: 'nombre' },
                                { data: 'correo' },
                                { data: 'telefono' },
                                { data: 'area' },
                                { data: 'puesto' },
                                { data: 'opts' }
                            ]
                        });
                        new $.fn.dataTable.FixedHeader( table );
                    });
                })
                .catch( function( err ){
                    console.log( 'error...' + err );
                });
        }
    }
</script>