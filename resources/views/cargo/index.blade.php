@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card col-12 mt-5">
        <div class="card-header d-flex justify-content-between">
        Cargos
            <a class="btn btn-default" href="{{ route("cargos.create" ) }}"  data-toggle="tooltip" title="Nuevo"><i class="fa fa-plus"></i></a>
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
                @foreach ($list_cargo as $cargo)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $cargo->descripcion }}</td>
                        <td>{{ $cargo->estado->descripcion ?? "" }} </td>
                        <td>
                            <div class="d-flex">
                                <a class="btn btn-default" href="{{ route("cargos.edit",$cargo ) }}"  data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-default" href="{{ route("cargos.show",$cargo ) }}" data-toggle="tooltip"  title="Ver"><i class="fa fa-eye"></i></a>
                                
                                <form action="{{ route("cargos.destroy", $cargo) }}" method="POST">
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

            {!! $list_cargo->links() !!}
        </div>
    </div>  
  </div>    
@endsection;