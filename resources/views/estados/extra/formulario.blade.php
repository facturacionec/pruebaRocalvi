{{ csrf_field()  }}
<div class="form-group">
    <label for="title">Descripción</label>
    <input id="title" type="text" name="descripcion" required="required" maxlength="155" class="form-control"
        placeholder="Descripción" value="{{ $estado->descripcion ?? old('descripcion') }}">
</div>
<div class="form-group">
    <label for="title">Estado</label>
    <select name="estado_me_id" id="estado_me_id" class="form-control">
        @foreach ($list_estado as $estado)
        @php
            $estado_me_id = -1;
            if( isset($estado) ){
                $estado_me_id = $estado->estado_me_id;
            }
        @endphp
            <option value="{{ $estado->id }}" @if($estado_me_id == $estado->id) selected @endif>{{ $estado->descripcion }}</option>
        @endforeach
    </select> 
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Crear</button>
</div>