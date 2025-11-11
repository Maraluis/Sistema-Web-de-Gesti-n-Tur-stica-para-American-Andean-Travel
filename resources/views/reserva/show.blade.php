@extends('template')

@section('title', 'Detalle de Reserva')

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-sm-6">
                    <h3>Detalle de Reserva #{{ $reserva->id }}</h3>
                </div>
                <div class="col-sm-6 text-end">
                    <a href="{{ route('reservas.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Volver
                    </a>
                </div>
            </div>

            <div class="row">
                <!-- Información del Cliente -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="bi bi-person-circle"></i> Información del Cliente</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <th width="40%">Nombre Completo:</th>
                                    <td>{{ $reserva->cliente->nombres }} {{ $reserva->cliente->apellidos }}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{ $reserva->cliente->correo }}</td>
                                </tr>
                                <tr>
                                    <th>Teléfono:</th>
                                    <td>{{ $reserva->cliente->telefono }}</td>
                                </tr>
                                <tr>
                                    <th>Documento:</th>
                                    <td>{{ strtoupper($reserva->cliente->tipo_documento) }}: {{ $reserva->cliente->documento }}</td>
                                </tr>
                                <tr>
                                    <th>Nacionalidad:</th>
                                    <td>{{ $reserva->cliente->nacionalidad ?? 'No especificado' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Información de la Reserva -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0"><i class="bi bi-calendar-check"></i> Información de la Reserva</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <th width="40%">Fecha de Reserva:</th>
                                    <td>{{ \Carbon\Carbon::parse($reserva->fecha_reserva)->format('d/m/Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Fecha Inicio Tour:</th>
                                    <td><strong class="text-success">{{ \Carbon\Carbon::parse($reserva->fecha_inicio)->format('d/m/Y') }}</strong></td>
                                </tr>
                                <tr>
                                    <th>Fecha Fin Tour:</th>
                                    <td><strong class="text-danger">{{ \Carbon\Carbon::parse($reserva->fecha_fin)->format('d/m/Y') }}</strong></td>
                                </tr>
                                <tr>
                                    <th>Número de Personas:</th>
                                    <td><span class="badge bg-secondary">{{ $reserva->num_personas }} persona(s)</span></td>
                                </tr>
                                <tr>
                                    <th>Precio Total:</th>
                                    <td><strong class="text-primary fs-5">S/ {{ number_format($reserva->precio_total, 2) }}</strong></td>
                                </tr>
                                <tr>
                                    <th>Estado Reserva:</th>
                                    <td>
                                        @if($reserva->estado == 'confirmada')
                                            <span class="badge bg-success">Confirmada</span>
                                        @elseif($reserva->estado == 'pendiente')
                                            <span class="badge bg-warning">Pendiente</span>
                                        @else
                                            <span class="badge bg-danger">Cancelada</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Estado Pago:</th>
                                    <td>
                                        @if($reserva->estado_pago == 'pagado')
                                            <span class="badge bg-success"><i class="bi bi-check-circle"></i> Pagado</span>
                                        @else
                                            <span class="badge bg-danger"><i class="bi bi-x-circle"></i> Pendiente</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Información del Paquete -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0"><i class="bi bi-box-seam"></i> Detalles del Paquete Turístico</h5>
                        </div>
                        <div class="card-body">
                            <h3 class="text-primary">{{ $reserva->paquete->nombre }}</h3>
                            <hr>
                            
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <p><strong><i class="bi bi-geo-alt"></i> Destino:</strong> {{ $reserva->paquete->destino }}</p>
                                    <p><strong><i class="bi bi-clock"></i> Duración:</strong> {{ $reserva->paquete->duracion }} días</p>
                                    <p><strong><i class="bi bi-cash"></i> Precio por persona:</strong> S/ {{ number_format($reserva->paquete->precio, 2) }}</p>
                                </div>
                            </div>

                            <div class="mb-3">
                                <h5><i class="bi bi-file-text"></i> Descripción:</h5>
                                <p class="text-justify">{{ $reserva->paquete->descripcion }}</p>
                            </div>

                                    @if($reserva->paquete->incluye)
                                    <div class="mb-3">
                                        <h5><i class="bi bi-check-circle"></i> Incluye:</h5>
                                        <p class="text-justify">{{ $reserva->paquete->incluye }}</p>
                                    </div>
                                    @endif

                                    @if($reserva->paquete->no_incluye)
                                    <div class="mb-3">
                                        <h5><i class="bi bi-x-circle"></i> No Incluye:</h5>
                                        <p class="text-justify">{{ $reserva->paquete->no_incluye }}</p>
                                    </div>
                                    @endif

                            @if($reserva->paquete->recomendaciones)
                            <div class="mb-3">
                                <h5><i class="bi bi-lightbulb"></i> Recomendaciones:</h5>
                                <p class="text-justify">{{ $reserva->paquete->recomendaciones }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Observaciones/Detalles -->
            @if($reserva->detalles)
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-warning">
                            <h5 class="mb-0"><i class="bi bi-chat-left-text"></i> Observaciones / Detalles</h5>
                        </div>
                        <div class="card-body">
                            <p class="mb-0">{{ $reserva->detalles }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
</main>
@endsection
