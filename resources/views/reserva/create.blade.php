@extends('template')

@section('title', 'Crear Reserva')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-sm-6">
                    <h3>Crear nueva reserva</h3>
                </div>
                <div class="col-sm-6 text-end">
                    <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Volver</a>
                </div>
            </div>

            <form action="{{ route('reservas.store') }}" method="POST">
                @csrf
                <div class="card card-body">
                    <div class="mb-3">
                        <label for="cliente_id" class="form-label">Cliente</label>
                        <select name="cliente_id" id="cliente_id" class="form-select @error('cliente_id') is-invalid @enderror" required>
                            <option value="" disabled selected>Selecciona un cliente</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                                    {{ $cliente->nombres }} {{ $cliente->apellidos }}
                                </option>
                            @endforeach
                        </select>
                        @error('cliente_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="paquete_id" class="form-label">Paquete</label>
                        <select name="paquete_id" id="paquete_id" class="form-select @error('paquete_id') is-invalid @enderror" required>
                            <option value="" disabled selected>Selecciona un paquete</option>
                            @foreach($paquetes as $paquete)
                                <option value="{{ $paquete->id }}" {{ old('paquete_id') == $paquete->id ? 'selected' : '' }}>
                                    {{ $paquete->nombre ?? 'Paquete ' . $paquete->id }}
                                </option>
                            @endforeach
                        </select>
                        @error('paquete_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="fecha_reserva" class="form-label">Fecha de Reserva</label>
                        <input type="date" name="fecha_reserva" id="fecha_reserva"
                            class="form-control @error('fecha_reserva') is-invalid @enderror"
                            value="{{ old('fecha_reserva') }}" required min="{{ date('Y-m-d') }}">
                        @error('fecha_reserva')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select name="estado" id="estado" class="form-select @error('estado') is-invalid @enderror" required>
                            <option value="pendiente" {{ old('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="confirmada" {{ old('estado') == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
                            <option value="pagada" {{ old('estado') == 'pagada' ? 'selected' : '' }}>Pagada</option>
                            <option value="cancelada" {{ old('estado') == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                        </select>
                        @error('estado')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="detalles" class="form-label">Detalles (opcional)</label>
                        <textarea name="detalles" id="detalles" rows="3" class="form-control @error('detalles') is-invalid @enderror">{{ old('detalles') }}</textarea>
                        @error('detalles')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar Reserva</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
