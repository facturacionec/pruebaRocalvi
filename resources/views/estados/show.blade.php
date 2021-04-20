@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card col-12 mt-5"> 
        <div class="card-header d-flex justify-content-between">
            Ver Estado
            <a class="btn btn-default" href="{{ route("estados.index" ) }}"  data-toggle="tooltip" title="Listado"><i class="fa fa-book"></i></a>
        </div>
        <div class="card-body"> 
            <div class="descripcion">
                <strong>Descripción: </strong>{{ $estado->descripcion }}
            </div>
            <div class="estado">
                <strong>Estado: </strong>{{ $estado->estado->descripcion ?? "" }}
            </div>
        </div>
    </div>  
  </div>    
@endsection;