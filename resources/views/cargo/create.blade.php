@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card col-12 mt-5">
        <div class="card-header">Crear Cargos</div>
        <div class="card-body">    
            @if ($errors->any())
              @include( "extra.alertas" )
            @endif         
            <form action="{{ route("cargos.store") }}" method="POST">
                @include( "cargo.extra.formulario" )
            </form>
        </div>
    </div>  
  </div>    
@endsection;

@section('title')
  Crear Cargo
@endsection;

 
 
 