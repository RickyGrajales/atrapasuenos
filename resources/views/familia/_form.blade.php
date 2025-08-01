<form action="{{ isset($familia) ? route('familia.update', $familia->id) : route('familia.store') }}" method="POST">
    @csrf
    @if(isset($familia))
        @method('PUT')
    @endif

    <div class="mb-3">
        <label for="nna_id" class="form-label">NNA</label>
        <select name="nna_id" class="form-control" required>
            <option value="">Seleccione</option>
            @foreach ($nnaList as $nna)
                <option value="{{ $nna->id }}" {{ isset($familia) && $familia->nna_id == $nna->id ? 'selected' : '' }}>
                    {{ $nna->nombres }} {{ $nna->apellidos }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Nombre madre</label>
        <input type="text" name="nombre_madre" class="form-control"
            value="{{ $familia->nombre_madre ?? old('nombre_madre') }}">
    </div>

    <div class="mb-3">
        <label>Nombre padre</label>
        <input type="text" name="nombre_padre" class="form-control"
            value="{{ $familia->nombre_padre ?? old('nombre_padre') }}">
    </div>

    <div class="mb-3">
        <label>Otros miembros</label>
        <input type="text" name="otros_miembros" class="form-control"
            value="{{ $familia->otros_miembros ?? old('otros_miembros') }}">
    </div>

    <div class="mb-3">
        <label>Teléfono</label>
        <input type="text" name="telefono" class="form-control"
            value="{{ $familia->telefono ?? old('telefono') }}">
    </div>

    <div class="mb-3">
        <label>Dirección</label>
        <input type="text" name="direccion" class="form-control"
            value="{{ $familia->direccion ?? old('direccion') }}">
    </div>

    <div class="mb-3">
        <label>Observaciones</label>
        <textarea name="observaciones" class="form-control">{{ $familia->observaciones ?? old('observaciones') }}</textarea>
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('familia.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
