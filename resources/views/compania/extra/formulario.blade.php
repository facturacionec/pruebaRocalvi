{{ csrf_field()  }}
<div class="form-group">
    <label for="title">RUC</label>
    <input id="title" type="text" name="ruc" required="required" maxlength="13" class="form-control"
        placeholder="RUC" value="{{ $compania->ruc ?? old('ruc') }}">
</div>
<div class="form-group">
    <label for="title">Razón Social</label>
    <input id="title" type="text" name="razon_social" required="required" maxlength="100" class="form-control"
        placeholder="Razón Social" value="{{ $compania->razon_social ?? old('razon_social') }}">
</div>
<div class="form-group">
    <label for="title">Estado</label>
    <select name="estado_id" id="estado_id" class="form-control">
        @foreach ($list_estado as $estado)
        @php
            $estado_id = -1;
            if( isset($compania) ){
                $estado_id = $compania->estado_id;
            }
        @endphp
            <option value="{{ $estado->id }}" @if($estado_id == $estado->id) selected @endif>{{ $estado->descripcion }}</option>
        @endforeach
    </select> 
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Crear</button>
</div>