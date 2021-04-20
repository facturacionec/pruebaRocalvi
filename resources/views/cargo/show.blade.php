@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card col-12 mt-5"> 
        <div class="card-header d-flex justify-content-between">
            Ver Cargos
            <a class="btn btn-default" href="{{ route("cargos.index" ) }}"  data-toggle="tooltip" title="Listado"><i class="fa fa-book"></i></a>
        </div>
        <div class="card-body"> 
            <div class="descripcion">
                <strong>Descripción: </strong>{{ $cargo->descripcion }}
            </div>
            <div class="estado">
                <strong>Estado: </strong>{{ $cargo->estado->descripcion ?? "" }}
            </div>
        </div>
    </div>  
  </div>    
@endsection;