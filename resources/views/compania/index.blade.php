@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card col-12 mt-5">
        <div class="card-header d-flex justify-content-between">
        Empresas
            <a class="btn btn-default" href="{{ route("empresas.create" ) }}"  data-toggle="tooltip" title="Nuevo"><i class="fa fa-plus"></i></a>
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
                        <td>Ruc</td>
                        <td>Razón social</td>
                        <td>Estado</td>
                        <td style="width: 10%;">Acciones</td>
                    </tr>
                </thead>
                <tbody>                
                @foreach ($list_compania as $empresa)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $empresa->ruc }}</td>
                        <td>{{ $empresa->razon_social }}</td>
                        <td>{{ $empresa->estado->descripcion ?? "" }} </td>
                        <td>
                            <div class="d-flex">
                                <a class="btn btn-default" href="{{ route("empresas.edit",$empresa ) }}"  data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-default" href="{{ route("empresas.show",$empresa ) }}" data-toggle="tooltip"  title="Ver"><i class="fa fa-eye"></i></a>
                                
                                <form action="{{ route("empresas.destroy", $empresa) }}" method="POST">
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

            {!! $list_compania->links() !!}
        </div>
    </div>  
  </div>    
@endsection;