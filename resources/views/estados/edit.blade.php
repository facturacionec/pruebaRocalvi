@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card col-12 mt-5">
        <div class="card-header">Editar Estados</div>
        <div class="card-body">    
            @if ($errors->any())
              @include( "extra.alertas" )
            @endif         
            <form action="{{ route("estados.update", $estado) }}" method="POST">
                @csrf
                @method('PUT')
                @include( "estados.extra.formulario" )
            </form>
        </div>
    </div>  
  </div>    
@endsection;