@extends('template')

@push('css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

@section('content')
    @if(session('success'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: '{{ session("success") }}',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
        </script>
    @endif

    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Hoteles</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Hoteles</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <a href="{{ route('hoteles.create') }}">
                    <button type="button" class="btn btn-outline-primary mb-2"><i class="bi bi-plus-circle"></i> Nuevo</button>
                </a>

                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Lista de hoteles</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Ciudad</th>
                                    <th>País</th>
                                    <th>Estrellas</th>
                                    <th>Precio/Noche</th>
                                    <th>Capacidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($hoteles as $hotel)
                                    <tr class="align-middle">
                                        <td>{{ $hotel->nombre }}</td>
                                        <td>{{ $hotel->ciudad }}</td>
                                        <td>{{ $hotel->pais }}</td>
                                        <td>
                                            @for($i = 0; $i < $hotel->estrellas; $i++)
                                                <i class="bi bi-star-fill text-warning"></i>
                                            @endfor
                                        </td>
                                        <td>S/ {{ number_format($hotel->precio_noche, 2) }}</td>
                                        <td>{{ $hotel->capacidad }} personas</td>
                                        <td>
                                            <a href="{{ route('hoteles.show', $hotel) }}" class="btn btn-info btn-sm">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>
                                            <a href="{{ route('hoteles.edit', $hotel) }}" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-square"></i> Editar
                                            </a>

                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalEliminar-{{ $hotel->id }}">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>

                                            <!-- Modal Eliminación -->
                                            <div class="modal fade" id="modalEliminar-{{ $hotel->id }}" tabindex="-1" aria-labelledby="modalLabel-{{ $hotel->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="modalLabel-{{ $hotel->id }}">Confirmar eliminación</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ¿Estás seguro que quieres eliminar el hotel <strong>{{ $hotel->nombre }}</strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            <form action="{{ route('hoteles.destroy', $hotel->id) }}" method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Sí, eliminar</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal Eliminación -->
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No hay hoteles registrados</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer clearfix">
                        {{ $hoteles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('js')
@endpush
