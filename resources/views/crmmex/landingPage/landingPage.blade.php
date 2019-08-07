<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{$nombreCampania}}</title>
        <link href="{{ asset( 'assets2/css/bootstrap.css' ) }}" rel="stylesheet">
        <script src="{{ asset( 'assets2/js/bootstrap.js' ) }}"></script>
    </head>
    <body>
      <div class="container-fluid">
            <nav class="navbar navbar-light bg-light">
              <a class="navbar-brand">
                  <img src="{{ asset( '/imagenPropietario' ) }}" width="200px">
              </a>
            </nav>
            <div class="row">
              <div class="col-sm-12">
                  {{$contenido}}
              </div>
              <div class="col-sm-12">
                <form id="formCampania" name="formCampania" class="needs-validation" novalidate action="/campaniaSave" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="contactoID" id="contactoID" value="{{$contactoID}}">
                  <input type="hidden" name="campaniaID" id="campaniaID" value="{{$campaniaID}}">
                  <input type="hidden" name="estado" id="estado" value="{{$estado}}">
                  @if( is_array( $formID ) )
                    <fieldset>
                      <legend>{{$formID[ 'nombreForm' ]}}</legend>
                      <div class="row">
                          @foreach( $formID[ 'fields' ] AS $field )
                            <div class="col-sm-12">
                                <label for="{{$field[ 'idInput' ]}}">{{$field['nombre']}}:</label>
                                @if( $field[ 'tipo' ] == "1" )
                                  <input type="text" name="{{$field[ 'idInput' ]}}" id="{{$field[ 'idInput' ]}}" placeholder="{{$field['nombre']}}" value="" class="form-control form-control-sm" @if( $field[ 'obligatoriedad' ] == 1 ) required @endif >
                                  <div class="invalid-feedback">Correcto!</div>
                                  <div class="invalid-feedback">Este campo es obligatorio!</div>
                                @elseif( $field[ 'tipo' ] == "2" )
                                  <select name="{{$field[ 'idInput' ]}}" id="{{$field[ 'idInput' ]}}" class="custom-select custom-select-sm">
                                     @foreach( explode( ',' , $field[ 'valores' ] ) AS $valor )
                                        <option value="{{$valor}}">{{$valor}}</option>
                                     @endforeach
                                  </select>
                                @elseif( $field[ 'tipo' ] == "3" )
                                  <div class="form-check form-check-inline">
                                    @foreach( explode( ',' , $field[ 'valores' ] ) AS $valor )
                                       <input type="checkbox" name="{{$field[ 'idInput' ]}}[]" id="{{$field[ 'idInput' ]}}_{{ $loop->iteration }}" value="{{$valor}}" class="form-check-input ml-3">
                                       <label class="form-check-label" for="{{$field[ 'idInput' ]}}_{{ $loop->iteration }}">{{$valor}}</label>
                                    @endforeach
                                  </div>
                                @endif
                            </div>
                          @endforeach
                          <div class="col-sm-12 mt-2 text-center">
                              <button type="submit" name="gdaFormCampania" id="gdaFormCampania" class="btn btn-sm btn-info" ><i class="fa fa-sm fa-save"></i> Guardar</button>
                          </div>
                      </div>
                    </fieldset>
                  @endif
                </form>
              </div>
            </div>
      </div>
    </body>

    <script>
        (function() {
          'use strict';
          window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
        })();

    </script>

</html>
