@extends('template')
@section('title', 'Listado de Reservas')
@push('css')
<style>
    /* Colores para estados */
    .estado-pendiente {
        color: #856404;
        background-color: #fff3cd;
        border-radius: 0.25rem;
        padding: 0.2rem 0.5rem;
        font-weight: 600;
    }
    .estado-confirmada {
        color: #0c5460;
        background-color: #d1ecf1;
        border-radius: 0.25rem;
        padding: 0.2rem 0.5rem;
        font-weight: 600;
    }
    .estado-pagada {
        color: #155724;
        background-color: #d4edda;
        border-radius: 0.25rem;
        padding: 0.2rem 0.5rem;
        font-weight: 600;
    }
    .estado-cancelada {
        color: #721c24;
        background-color: #f8d7da;
        border-radius: 0.25rem;
        padding: 0.2rem 0.5rem;
        font-weight: 600;
    }
</style>
@endpush

@section('content')
<main class="app-main">
    <div class="app-content-header mb-3">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3>Listado de Reservas</h3>
                </div>
                <div class="col-sm-6 text-end">
                    <a href="{{ route('reservas.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Nueva Reserva
                    </a>
                    <a href="{{ route('reportes.todas.reservas') }}" class="btn btn-danger" target="_blank">
                        <i class="bi bi-file-pdf"></i> Reporte PDF - Todas las Reservas
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>¡Éxito!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif

        <div class="card card-outline card-primary">
            <div class="card-body p-0">
                @if($reservas->count())
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead class="table-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Cliente</th>
                                    <th>Paquete</th>
                                    <th>Fecha Reserva</th>
                                    <th>Fecha Inicio</th>
                                    <th>Precio Total</th>
                                    <th>Estado Reserva</th>
                                    <th>Estado Pago</th>
                                    <th class="text-center" style="width:120px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservas as $reserva)
                                <tr>
                                    <td>{{ $loop->iteration + ($reservas->currentPage() - 1) * $reservas->perPage() }}</td>
                                    <td>{{ $reserva->cliente->nombres ?? 'N/A' }} {{ $reserva->cliente->apellidos ?? '' }}</td>
                                    <td>{{ $reserva->paquete->nombre ?? 'N/A' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($reserva->fecha_reserva)->format('d/m/Y') }}</td>
                                    <td>{{ $reserva->fecha_inicio ? \Carbon\Carbon::parse($reserva->fecha_inicio)->format('d/m/Y') : 'N/A' }}</td>
                                    <td><strong>S/ {{ number_format($reserva->precio_total ?? 0, 2) }}</strong></td>
                                    <td>
                                        @if($reserva->estado == 'confirmada')
                                            <span class="badge bg-success">Confirmada</span>
                                        @elseif($reserva->estado == 'pendiente')
                                            <span class="badge bg-warning">Pendiente</span>
                                        @else
                                            <span class="badge bg-danger">Cancelada</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($reserva->estado_pago == 'pagado')
                                            <span class="badge bg-success"><i class="bi bi-check-circle"></i> Pagado</span>
                                        @else
                                            <span class="badge bg-danger"><i class="bi bi-x-circle"></i> Pendiente</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('reservas.show', $reserva->id) }}" class="btn btn-sm btn-info" title="Ver Detalles">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            
                                            <a href="{{ route('reservas.edit', $reserva->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalEliminar-{{ $reserva->id }}" title="Eliminar">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>

                                        <!-- Modal Eliminación -->
                                        <div class="modal fade" id="modalEliminar-{{ $reserva->id }}" tabindex="-1" aria-labelledby="modalLabel-{{ $reserva->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalLabel-{{ $reserva->id }}">Confirmar eliminación</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Estás seguro que quieres eliminar la reserva de <strong>{{ $reserva->cliente->nombres }} {{ $reserva->cliente->apellidos }}</strong> para el paquete <strong>{{ $reserva->paquete->nombre }}</strong>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                        <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Sí, eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="p-3">
                        {{ $reservas->links() }}
                    </div>
                @else
                    <div class="p-3">
                        <p class="text-center text-muted">No hay reservas registradas.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection

@push('js')
@endpush
