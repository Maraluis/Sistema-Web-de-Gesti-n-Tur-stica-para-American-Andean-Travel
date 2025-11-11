@extends('template')
@section('title', 'Ver hotel')
@push('css')
@endpush
@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Detalles del hotel</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('hoteles.index') }}">Hoteles</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ver</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">{{ $hotele->nombre }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if($hotele->imagen)
                            <div class="col-md-4 mb-3">
                                <img src="{{ asset('storage/' . $hotele->imagen) }}" alt="{{ $hotele->nombre }}" class="img-fluid rounded">
                            </div>
                        @endif
                        <div class="col-md-{{ $hotele->imagen ? '8' : '12' }}">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="200">Nombre:</th>
                                    <td>{{ $hotele->nombre }}</td>
                                </tr>
                                <tr>
                                    <th>Dirección:</th>
                                    <td>{{ $hotele->direccion }}</td>
                                </tr>
                                <tr>
                                    <th>Ciudad:</th>
                                    <td>{{ $hotele->ciudad }}</td>
                                </tr>
                                <tr>
                                    <th>País:</th>
                                    <td>{{ $hotele->pais }}</td>
                                </tr>
                                <tr>
                                    <th>Estrellas:</th>
                                    <td>
                                        @for($i = 0; $i < $hotele->estrellas; $i++)
                                            <i class="bi bi-star-fill text-warning"></i>
                                        @endfor
                                        ({{ $hotele->estrellas }})
                                    </td>
                                </tr>
                                <tr>
                                    <th>Teléfono:</th>
                                    <td>{{ $hotele->telefono ?? 'No especificado' }}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{ $hotele->email ?? 'No especificado' }}</td>
                                </tr>
                                <tr>
                                    <th>Precio por noche:</th>
                                    <td><strong class="text-success">S/ {{ number_format($hotele->precio_noche, 2) }}</strong></td>
                                </tr>
                                <tr>
                                    <th>Capacidad:</th>
                                    <td>{{ $hotele->capacidad }} personas</td>
                                </tr>
                                <tr>
                                    <th>Servicios:</th>
                                    <td>{{ $hotele->servicios ?? 'No especificado' }}</td>
                                </tr>
                                <tr>
                                    <th>Descripción:</th>
                                    <td>{{ $hotele->descripcion ?? 'Sin descripción' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('hoteles.edit', $hotele) }}" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i> Editar
                    </a>
                    <a href="{{ route('hoteles.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Volver
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('js')
@endpush
