@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card col-12 mt-5">
        <div class="card-header d-flex justify-content-between">
        Estados
            <a class="btn btn-default" href="{{ route("estados.create" ) }}"  data-toggle="tooltip" title="Nuevo"><i class="fa fa-plus"></i></a>
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
                        <td>ID</td>
                        <td>Descripción</td>
                        <td>Estado</td>
                        <td style="width: 10%;">Acciones</td>
                    </tr>
                </thead>
                <tbody>                
                @foreach ($list_estado as $estados)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $estados->descripcion }}</td>
                        <td>{{ $estados->estado->descripcion ?? "" }} </td>
                        <td>
                            <div class="d-flex">
                                <a class="btn btn-default" href="{{ route("estados.edit",$estados ) }}"  data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-default" href="{{ route("estados.show",$estados ) }}" data-toggle="tooltip"  title="Ver"><i class="fa fa-eye"></i></a>
                                
                                <form action="{{ route("estados.destroy", $estados) }}" method="POST">
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

            {!! $list_estado->links() !!}
        </div>
    </div>  
  </div>    
@endsection;