@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card col-12 mt-5">
        <div class="card-header">Editar Empleados</div>
        <div class="card-body">    
            @if ($errors->any())
              @include( "extra.alertas" )
            @endif        
            <form action="{{ route("empleados.update", $empleado) }}" method="POST">
                @csrf
                @method('PUT')
                @include( "empleado.extra.formulario" )
            </form>
        </div>
    </div>  
  </div>    
@endsection;