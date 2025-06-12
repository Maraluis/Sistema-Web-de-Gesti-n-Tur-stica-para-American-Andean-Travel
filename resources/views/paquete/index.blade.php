@extends('template')

@push('css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

@section('content')
    @if (session('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "{{ session('success') }}"
            });
        </script>
    @endif

    <main class="app-main">
        <!--begin::Header-->
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Paquetes</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Inicio</a></li>
                            <li class="breadcrumb-item active">Paquetes</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Header-->

        <div class="app-content">
            <div class="container-fluid">
                <a href="{{ route('paquetes.create') }}">
                    <button type="button" class="btn btn-outline-primary mb-2">
                        <i class="bi bi-plus-circle"></i> Nuevo
                    </button>
                </a>

                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Tabla de paquetes turísticos</h3>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Destino</th>
                                    <th>Precio</th>
                                    <th>Duración (días)</th>
                                    <th>Imagen</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paquetes as $paquete)
                                    <tr>
                                        <td>{{ $paquete->nombre }}</td>
                                        <td>{{ $paquete->destino }}</td>
                                        <td>S/ {{ number_format($paquete->precio, 2) }}</td>
                                        <td>{{ $paquete->duracion }}</td>
                                        <td>
                                            @if ($paquete->imagen)
                                                <img src="{{ asset('storage/' . $paquete->imagen) }}" width="80"
                                                    alt="Imagen del paquete">
                                            @else
                                                <span class="text-muted">Sin imagen</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('paquetes.edit', $paquete->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-square"></i> Editar
                                            </a>

                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modalEliminar-{{ $paquete->id }}">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>

                                            <!-- Modal de confirmación -->
                                            <div class="modal fade" id="modalEliminar-{{ $paquete->id }}" tabindex="-1"
                                                aria-labelledby="modalLabel-{{ $paquete->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5"
                                                                id="modalLabel-{{ $paquete->id }}">Confirmar eliminación
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Cerrar"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ¿Estás seguro que quieres eliminar el paquete
                                                            <strong>{{ $paquete->nombre }}</strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancelar</button>
                                                            <form action="{{ route('paquetes.destroy', $paquete->id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Sí,
                                                                    eliminar</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Fin Modal -->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer clearfix">
                     
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('js')
@endpush
