@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card col-12 mt-5"> 
        <div class="card-header d-flex justify-content-between">
            Ver empresa
            <a class="btn btn-default" href="{{ route("empresas.index" ) }}"  data-toggle="tooltip" title="Listado"><i class="fa fa-book"></i></a>
        </div>
        <div class="card-body"> 
            <div class="ruc">
                <strong>RUC: </strong>{{ $compania->ruc }}
            </div>
            <div class="razon_social">
                <strong>Razón social: </strong>{{ $compania->razon_social }}
            </div>
            <div class="estado">
                <strong>Estado: </strong>{{ $compania->estado->descripcion ?? "" }}
            </div>
        </div>
    </div>  
  </div>    
@endsection;