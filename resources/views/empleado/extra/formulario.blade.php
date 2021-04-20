{{ csrf_field()  }} 
<div class="form-group">
    <label for="title">Secuencia</label>
    <input id="title" type="text" name="secuencia"  class="form-control"
        placeholder="id" value="{{ $empleado->id ?? old('id') }}" readonly="true">    

    <label for="title">Cédula</label>
    <input id="title" type="text" name="cedula" required="required" maxlength="10" class="form-control"
        placeholder="Cédula" value="{{ $empleado->cedula ?? old('cedula') }}">
</div>  
<div class="row"> 
    <div class="form-group col-6">
        <label for="title">Apellido 1</label>
        <input id="title" type="text" name="apellido1" required="required" maxlength="155" class="form-control"
            placeholder="Apellido 1" value="{{ $empleado->apellido1 ?? old('apellido1') }}">
    </div>
    <div class="form-group col-6">
        <label for="title">Apellido 2</label>
        <input id="title" type="text" name="apellido2"  maxlength="155" class="form-control"
            placeholder="Apellido 2" value="{{ $empleado->apellido2 ?? old('apellido2') }}">
    </div> 
</div>
<div class="row"> 
    <div class="form-group col-6">
        <label for="title">Nombre 1</label>
        <input id="title" type="text" name="nombre1" required="required" maxlength="155" class="form-control"
            placeholder="Nombre 1" value="{{ $empleado->nombre1 ?? old('nombre1') }}">
    </div>
    <div class="form-group col-6">
        <label for="title">Nombre 2</label>
        <input id="title" type="text" name="nombre2"  maxlength="155" class="form-control"
            placeholder="Nombre 2" value="{{ $empleado->nombre2 ?? old('nombre2') }}">
    </div> 
</div> 

<div class="form-group  ">
    <label for="title">Firma</label>   
    <input id="title" type="text" name="firma"  class="form-control"
        placeholder="firma" value="{{ $empleado->nombre1 ?? old('nombre1') }} + {{ $empleado->nombre2 ?? old('') }} 
+ {{ $empleado->apellido1 ?? old('apellido1') }} + {{ $empleado->apellido2 ?? old('') }}" readonly="true">
</div> 


<div class="form-group  ">
    <label for="title">Correo Electrónico</label>
    <input id="title" type="text" name="correo" required="required" maxlength="155" class="form-control"
        placeholder="Correo Electrónico" value="{{ $empleado->correo ?? old('correo') }}">
</div>  
<div class="row"> 
    <div class="form-group col-6">
        <label for="title">Teléfono Cel</label>
        <input id="title" type="text" name="telcel"  maxlength="155" class="form-control"
            placeholder="Teléfono Cel" value="{{ $empleado->telcel ?? old('telcel') }}">
    </div> 
    <div class="form-group col-6">
        <label for="title">Teléfono</label>
        <input id="title" type="text" name="telefono" required="required" maxlength="155" class="form-control"
            placeholder="Teléfono" value="{{ $empleado->telefono ?? old('telefono') }}">
    </div>
</div>
<div class="row"> 
    <div class="form-group col-6">
        <label for="title">Teléfono ext</label>
        <input id="title" type="text" name="telext"  maxlength="155" class="form-control"
            placeholder="Teléfono ext" value="{{ $empleado->telext ?? old('telext') }}">
    </div> 
    <div class="form-group col-6">
        <label for="title">Whatsapp</label>
        <input id="title" type="text" name="whatsapp" maxlength="155" class="form-control"
            placeholder="Whatsapp" value="{{ $empleado->whatsapp ?? old('whatsapp') }}">
    </div>
</div> 
<div class="row"> 
    <div class="form-group col-6">
        <label for="title">Cargo</label>
        <select name="cargo_id" id="cargo_id" class="form-control">
            @foreach ($list_cargo as $cargo)
            @php
                $cargo_id = -1;
                if( isset($empleado) ){
                    $cargo_id = $empleado->cargo_id;
                }
            @endphp
                <option value="{{ $cargo->id }}" @if($cargo_id == $cargo->id) selected @endif>{{ $cargo->descripcion }}</option>
            @endforeach
        </select> 
    </div>
    <div class="form-group col-6">
        <label for="title">Empresa</label>
        <select name="empresa_id" id="empresa_id" class="form-control">
            @foreach ($list_compania as $empresa)
            @php
                $empresa_id = -1;
                if( isset($empleado) ){
                    $empresa_id = $empleado->empresa_id;
                }
            @endphp
                <option value="{{ $empresa->id }}" @if($empresa_id == $empresa->id) selected @endif>{{ $empresa->razon_social }} ({{ $empresa->ruc }})</option>
            @endforeach
        </select> 
    </div>
</div>
<div class="form-group">
    <label for="title">Estado</label>
    <select name="estado_id" id="estado_id" class="form-control">
        @foreach ($list_estado as $estado)
        @php
            $estado_id = -1;
            if( isset($empleado) ){
                $estado_id = $empleado->estado_id;
            }
        @endphp
            <option value="{{ $estado->id }}" @if($estado_id == $estado->id) selected @endif>{{ $estado->descripcion }}</option>
        @endforeach
    </select> 
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Crear</button>
</div>