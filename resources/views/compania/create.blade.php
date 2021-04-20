@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card col-12 mt-5">
        <div class="card-header">Crear Empresa</div>
        <div class="card-body">    
            @if ($errors->any())
              @include( "extra.alertas" )
            @endif        
            <form action="{{ route("empresas.store") }}" method="POST">
                @include( "compania.extra.formulario" )
            </form>
        </div>
    </div>  
  </div>    
@endsection;