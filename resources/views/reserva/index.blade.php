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
                        <i class="fas fa-plus"></i> Nueva Reserva
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
                                    <th>Fecha de Reserva</th>
                                    <th>Estado</th>
                                    <th>Detalles</th>
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
                                    <td>
                                        <span class="estado-{{ $reserva->estado }}">
                                            {{ ucfirst($reserva->estado) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($reserva->detalles)
                                            {{ Str::limit($reserva->detalles, 50) }}
                                        @else
                                            <em>No hay detalles</em>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('reservas.edit', $reserva->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar esta reserva?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" title="Eliminar">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
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
