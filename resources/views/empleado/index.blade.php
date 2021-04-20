@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card col-12 mt-5">
        <div class="card-header d-flex justify-content-between">
        Empleado
            <a class="btn btn-default" href="{{ route("empleados.create" ) }}"  data-toggle="tooltip" title="Nuevo"><i class="fa fa-plus"></i></a>
        </div>
        <div class="card-body">    
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif                
            <table class="table">
                <thead>
                    <tr>
                        <td>No.</td>
                        <!-- <td>Secuencia</td> -->
                        <td>Cédula</td>
                        <td>Nombre</td>
                        <td>Cargo</td> 
                        <td>Estado</td>
                        <td style="width: 10%;">Acciones</td>
                    </tr>
                </thead>
                <tbody>                
                @foreach ($list_empleado as $empleado)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <!-- <td>{{ $empleado->id }}</td> -->
                        <td>{{ $empleado->cedula }}</td>
                        <td>{{ $empleado->nombre1 }} {{ $empleado->nombre2 }} {{ $empleado->apellido1 }} {{ $empleado->apellido2 }}</td>
                        <td>{{ $empleado->cargo->descripcion ?? "" }} </td>
                        <td>{{ $empleado->estado->descripcion ?? "" }} </td>
                        <td>
                            <div class="d-flex">
                                <a class="btn btn-default" href="{{ route("empleados.edit",$empleado ) }}"  data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-default" href="{{ route("empleados.show",$empleado ) }}" data-toggle="tooltip"  title="Ver"><i class="fa fa-eye"></i></a>
                                
                                <form action="{{ route("empleados.destroy", $empleado) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-default" type="submit" data-toggle="tooltip"   title="Borrar" >
                                        <i class="fas fa-trash text-danger"></i>
                                    </button>
                                </form> 
                            </div>
                        </td>
                    </tr> 
                @endforeach
                </tbody>
            </table>

            {!! $list_empleado->links() !!}


            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Generar QR'S
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content"> 
                <div class="modal-body">
                <div id="example" class="container-fluid">
                    @php
                     $indice = 1;
                    @endphp


                    @foreach ($list_empleado as $empleado)                     
                    
                    <div class="row">
                        <div class="col-sm-11">
                        <div class="row">
                            <div class="col-md-8 ml-auto">
                                    <div class="text-capitalize" style="font-family: 'Calibri', serif; font-size: 20px;" > 
                                    
                                    <strong>{{ $empleado->nombre1 ?? old('') }}  {{ $empleado->apellido1 ?? old('') }}</strong> 
                                </div>
                                <div class="text-uppercase">{{ $empleado->cargo->descripcion ?? old('') }}  </div>
                                <div> 
                                    <i class="fa fa-envelope"></i>    
                                    {{ $empleado->correo ?? old('') }}  
                                </div>
                                <div>
                                    <i class="fa fa-phone-alt"></i>    
                                    {{ $empleado->telefono ?? old('') }}  
                                </div>                                    
                                <div>
                                    <i class="fa fa-mobile-alt"></i>    
                                    {{ $empleado->telcel ?? old('') }}  
                                </div>                                       
                            </div>                          
                            <div id="qr-empleado-{{ $indice }}" class="col-md-4 ml-auto">

                            </div>                             
                        </div> 
                        </div>                           
                    </div>  
                        @php
                            $indice++;
                        @endphp
                    @endforeach
                
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
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

                @php
                $indice = 1;
                @endphp

                @foreach ($list_empleado as $empleado) 

                jQuery("#qr-empleado-{{ $indice }}").kendoQRCode({
                    value: "{{ $empleado->nombre1 ?? old('') }} {{ $empleado->apellido1 ?? old('') }} + {{ $empleado->cargo ?? old('') }} + {{ $empleado->correo ?? old('') }}",
                    size: 120,
                    color: "#e15613",
                    background: "transparent"
                }); 

                @php
                $indice++;
                @endphp
                @endforeach
                                
            });
         }

     </script>
@endsection;