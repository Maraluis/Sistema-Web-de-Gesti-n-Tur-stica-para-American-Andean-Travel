@extends('template')
@section('title', 'Ver restaurante')
@push('css')
@endpush
@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Detalles del restaurante</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('restaurantes.index') }}">Restaurantes</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ver</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">{{ $restaurante->nombre }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if($restaurante->imagen)
                            <div class="col-md-4 mb-3">
                                <img src="{{ asset('storage/' . $restaurante->imagen) }}" alt="{{ $restaurante->nombre }}" class="img-fluid rounded">
                            </div>
                        @endif
                        <div class="col-md-{{ $restaurante->imagen ? '8' : '12' }}">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="200">Nombre:</th>
                                    <td>{{ $restaurante->nombre }}</td>
                                </tr>
                                <tr>
                                    <th>Dirección:</th>
                                    <td>{{ $restaurante->direccion }}</td>
                                </tr>
                                <tr>
                                    <th>Ciudad:</th>
                                    <td>{{ $restaurante->ciudad }}</td>
                                </tr>
                                <tr>
                                    <th>País:</th>
                                    <td>{{ $restaurante->pais }}</td>
                                </tr>
                                <tr>
                                    <th>Tipo de cocina:</th>
                                    <td><span class="badge bg-info">{{ $restaurante->tipo_cocina }}</span></td>
                                </tr>
                                <tr>
                                    <th>Teléfono:</th>
                                    <td>{{ $restaurante->telefono ?? 'No especificado' }}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{ $restaurante->email ?? 'No especificado' }}</td>
                                </tr>
                                <tr>
                                    <th>Precio promedio:</th>
                                    <td><strong class="text-success">S/ {{ number_format($restaurante->precio_promedio, 2) }}</strong></td>
                                </tr>
                                <tr>
                                    <th>Capacidad:</th>
                                    <td>{{ $restaurante->capacidad }} personas</td>
                                </tr>
                                <tr>
                                    <th>Horario:</th>
                                    <td>{{ $restaurante->horario ?? 'No especificado' }}</td>
                                </tr>
                                <tr>
                                    <th>Especialidades:</th>
                                    <td>{{ $restaurante->especialidades ?? 'No especificado' }}</td>
                                </tr>
                                <tr>
                                    <th>Descripción:</th>
                                    <td>{{ $restaurante->descripcion ?? 'Sin descripción' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('restaurantes.edit', ['restaurante' => $restaurante]) }}" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i> Editar
                    </a>
                    <a href="{{ route('restaurantes.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Volver
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('js')
@endpush
