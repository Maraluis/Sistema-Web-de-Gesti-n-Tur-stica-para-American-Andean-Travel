@extends('template')

@section('title', 'Editar Reserva')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-sm-6">
                    <h3>Editar reserva</h3>
                </div>
                <div class="col-sm-6 text-end">
                    <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Volver</a>
                </div>
            </div>

            <form action="{{ route('reservas.update', $reserva->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="card card-body">

                    <div class="mb-3">
                        <label for="cliente_id" class="form-label">Cliente</label>
                        <select name="cliente_id" id="cliente_id" class="form-select @error('cliente_id') is-invalid @enderror" required>
                            <option value="" disabled>Selecciona un cliente</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}"
                                    {{ (old('cliente_id') ?? $reserva->cliente_id) == $cliente->id ? 'selected' : '' }}>
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
                            <option value="" disabled>Selecciona un paquete</option>
                            @foreach($paquetes as $paquete)
                                <option value="{{ $paquete->id }}"
                                    {{ (old('paquete_id') ?? $reserva->paquete_id) == $paquete->id ? 'selected' : '' }}>
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
                            value="{{ old('fecha_reserva') ?? $reserva->fecha_reserva }}"
                            required min="{{ date('Y-m-d') }}">
                        @error('fecha_reserva')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Fecha en que se realizó la reserva</small>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_inicio" class="form-label">Fecha de Inicio del Tour</label>
                        <input type="date" name="fecha_inicio" id="fecha_inicio"
                            class="form-control @error('fecha_inicio') is-invalid @enderror"
                            value="{{ old('fecha_inicio') ?? $reserva->fecha_inicio }}"
                            required min="{{ date('Y-m-d') }}">
                        @error('fecha_inicio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Fecha en que comenzará el viaje/tour</small>
                    </div>

                    <div class="mb-3">
                        <label for="num_personas" class="form-label">Número de Personas</label>
                        <input type="number" name="num_personas" id="num_personas"
                            class="form-control @error('num_personas') is-invalid @enderror"
                            value="{{ old('num_personas') ?? $reserva->num_personas ?? 1 }}"
                            required min="1" max="50">
                        @error('num_personas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">El precio se calculará automáticamente según el paquete</small>
                    </div>

                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado de Reserva</label>
                        <select name="estado" id="estado" class="form-select @error('estado') is-invalid @enderror" required>
                            @php
                                $estados = ['pendiente', 'confirmada', 'cancelada'];
                            @endphp
                            @foreach($estados as $estado)
                                <option value="{{ $estado }}"
                                    {{ (old('estado') ?? $reserva->estado) == $estado ? 'selected' : '' }}>
                                    {{ ucfirst($estado) }}
                                </option>
                            @endforeach
                        </select>
                        @error('estado')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="estado_pago" class="form-label">Estado de Pago</label>
                        <select name="estado_pago" id="estado_pago" class="form-select @error('estado_pago') is-invalid @enderror" required>
                            <option value="pendiente" {{ (old('estado_pago') ?? $reserva->estado_pago) == 'pendiente' ? 'selected' : '' }}>
                                Pendiente
                            </option>
                            <option value="pagado" {{ (old('estado_pago') ?? $reserva->estado_pago) == 'pagado' ? 'selected' : '' }}>
                                Pagado
                            </option>
                        </select>
                        @error('estado_pago')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="detalles" class="form-label">Detalles (opcional)</label>
                        <textarea name="detalles" id="detalles" rows="3" class="form-control @error('detalles') is-invalid @enderror">{{ old('detalles') ?? $reserva->detalles }}</textarea>
                        @error('detalles')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar Reserva</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
