@extends('template')

@push('css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

@section('content')
    @if (@session('success'))
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
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Clientes</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Clientes</li>
                        </ol>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <div class="app-content">
            <div class="container-fluid">
                <a href="{{ route('clientes.create') }}">
                    <button type="button" class="btn btn-outline-primary mb-2"><i class="bi bi-plus-circle"></i>
                        Nuevo</button>
                </a>
                {{-- TABLA DE DATOS --}}
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Tabla de clientes</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Documento</th>
                                    <th>Correo</th>
                                    <th>Telefono</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $cliente)
                                    <tr class="align-middle">
                                        <td>{{ $cliente->nombres }}</td>
                                        <td>{{ $cliente->apellidos }}</td>
                                        <td>
                                            @php
                                                $tipos = [
                                                    'dni' => 'DNI',
                                                    'carnet' => 'Carnet de extranjería',
                                                    'pasaporte' => 'Pasaporte',
                                                    'ptp' => 'Permiso Temporal de Permanencia',
                                                    'otro' => 'Otro',
                                                ];
                                                $tipoMostrar =
                                                    $tipos[$cliente->tipo_documento] ?? $cliente->tipo_documento;
                                            @endphp

                                            <strong>{{ $tipoMostrar }}:</strong><br>
                                            {{ $cliente->documento }}
                                        </td>
                                        <td>{{ $cliente->correo }}</td>
                                        <td>{{ $cliente->telefono }}</td>
                                        <td>
                                            <a href="{{ route('clientes.edit', ['cliente' => $cliente]) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-square"></i> Editar
                                            </a>

                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modalEliminar-{{ $cliente->id }}">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>

                                            <div class="modal fade" id="modalEliminar-{{ $cliente->id }}" tabindex="-1"
                                                aria-labelledby="modalLabel-{{ $cliente->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5"
                                                                id="modalLabel-{{ $cliente->id }}">Confirmar eliminación
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Cerrar"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ¿Estás seguro que quieres eliminar al cliente
                                                            <strong>{{ $cliente->nombres }}
                                                                {{ $cliente->apellidos }}</strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancelar</button>
                                                            <form
                                                                action="{{ route('clientes.destroy', ['cliente' => $cliente]) }}"
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
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </main>
@endsection

@push('js')
@endpush
