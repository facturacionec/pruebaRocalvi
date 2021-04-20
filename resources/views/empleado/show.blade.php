@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card col-12 mt-5"> 
        <div class="card-header d-flex justify-content-between">
            Ver Empleado
            <a class="btn btn-default" href="{{ route("empleados.index" ) }}"  data-toggle="tooltip" title="Listado"><i class="fa fa-book"></i></a>
        </div>
        <div class="card-body"> 
            <div class="id" >
                <strong >Secuencia: </strong>{{ $empleado->id }} 
            </div>
            <div class="ruc" >
                <strong>Cédula: </strong>{{ $empleado->cedula }}                
            </div>
            <div class="nombre">
                <strong>Nombres: </strong>{{ $empleado->nombre1 }} {{ $empleado->nombre2 }} {{ $empleado->apellido1 }} {{ $empleado->apellido2 }}
            </div>
            <div class="firma">
                <strong>Firma: </strong>{{ $empleado->nombre1 }}+{{ $empleado->nombre2 }}+{{ $empleado->apellido1 }}+{{ $empleado->apellido2 }}
            </div>            
            <div class="correo">
                <strong>Correo: </strong>{{ $empleado->correo }}
            </div>
            <div class="telcel">
                <strong>Telcel: </strong>{{ $empleado->telcel }}
            </div>
            <div class="telefono">
                <strong>Telefono: </strong>{{ $empleado->telefono }}
            </div>
            <div class="telext">
                <strong>Telext: </strong>{{ $empleado->telext }}
            </div>
            <div class="whatsapp">
                <strong>Whatsapp: </strong>{{ $empleado->whatsapp }}
            </div>
            <div class="cargo">
                <strong>Cargo: </strong>{{ $empleado->cargo->descripcion }}
            </div>
            <div class="cargo">
                <strong>Empresa: </strong>{{ $empleado->empresa->razon_social ?? "" }} ({{ $empleado->empresa->ruc ?? "" }}) 
            </div>
            <div class="cargo">
                <strong>Cargo: </strong>{{ $empleado->cargo->descripcion }}
            </div>
            <div class="estado">
                <strong>Estado: </strong>{{ $empleado->estado->descripcion ?? "" }}  
            </div>


            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Generar QR
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content"> 
                <div class="modal-body">
                <div id="example" class="k-content">

                <table>
                    <td>
                        <div ><strong>{{ $empleado->nombre1 ?? old('') }}  {{ $empleado->apellido1 ?? old('') }}</strong></div>
                        <div>{{ $empleado->cargo->descripcion ?? old('') }}  </div>
                        <div> 
                            <i class="fa fa-envelope"></i>    
                            {{ $empleado->correo ?? old('') }}  
                        </div>
                        <div>
                            <i class="fa fa-mobile-alt"></i>    
                            {{ $empleado->telefono ?? old('') }}  </div>               
                    </td>
                    <td>
                        <div id="qr-empleado"></div> 
                    </td>
                </table>
                        
                         
                        

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> 
                </div>
                </div>
            </div>
            </div>

        </div>
    </div>  
  </div>    
@endsection;

@section('script_adiconales')
     <script>
         window.onload = demo();
         function demo() {
            jQuery(window).ready(function () {

                jQuery("#qr-empleado").kendoQRCode({
                    value: "{{ $empleado->nombre1 ?? old('') }} {{ $empleado->apellido1 ?? old('') }} + {{ $empleado->cargo ?? old('') }} + {{ $empleado->correo ?? old('') }}",
                    size: 120,
                    color: "#e15613",
                    background: "transparent"
                });                 
            });
         }

     </script>
@endsection;
