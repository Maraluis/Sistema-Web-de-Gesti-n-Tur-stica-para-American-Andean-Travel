@extends('template')

@section('title', 'Dashboard - American Andean Travel')

@push('css')
<style>
    .stat-card {
        transition: transform 0.3s ease;
        cursor: pointer;
    }
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 20px rgba(0,0,0,0.15);
    }
    .info-box {
        min-height: 120px;
        transition: transform 0.3s ease;
        cursor: pointer;
    }
    .info-box:hover {
        transform: translateY(-3px);
        box-shadow: 0 3px 15px rgba(0,0,0,0.1);
    }
    .agency-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }
    .stat-icon {
        font-size: 3rem;
        opacity: 0.3;
    }
    .clickable-card {
        text-decoration: none;
        display: block;
        color: inherit;
    }
    .clickable-card:hover {
        text-decoration: none;
        color: inherit;
    }
    /* Asegurar que los enlaces dentro de small-box no tengan estilos de enlace */
    .clickable-card .small-box {
        color: white;
    }
    .clickable-card .small-box .inner h3,
    .clickable-card .small-box .inner p {
        color: inherit;
    }
</style>
@endpush

@section('content')
    <!--begin::App Main-->
    <main id="main" class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-12 mb-3">
                        <div class="agency-title">
                            <i class="bi bi-geo-alt-fill text-primary"></i> American Andean Travel
                        </div>
                        <p class="text-muted mb-0">Sistema de Gestión Turística</p>
                    </div>
                    <div class="col-sm-6">
                        <h3 class="mb-0">Dashboard</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row - Estadísticas Principales-->
                <div class="row">
                    <!--begin::Col - Clientes-->
                    <div class="col-lg-3 col-6 mb-4">
                        <a href="{{ route('clientes.index') }}" class="clickable-card">
                            <div class="small-box text-bg-primary stat-card">
                                <div class="inner">
                                    <h3>{{ $totalClientes }}</h3>
                                    <p>Clientes</p>
                                </div>
                                <svg class="small-box-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M16 11c1.66 0 3-1.34 3-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zm-8 0c1.66 0 3-1.34 3-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z" />
                                </svg>
                            </div>
                        </a>
                    </div>
                    <!--end::Col-->
                    
                    <!--begin::Col - Guías-->
                    <div class="col-lg-3 col-6 mb-4">
                        <a href="{{ route('guias.index') }}" class="clickable-card">
                            <div class="small-box text-bg-success stat-card">
                                <div class="inner">
                                    <h3>{{ $totalGuias }}</h3>
                                    <p>Guías</p>
                                </div>
                                <svg class="small-box-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M20.5 3l-5.5 2.5L9 3 3.5 5.5v16l5.5-2.5 6 2.5 5.5-2.5v-16zM9 5.3l6 2.5v11.9l-6-2.5V5.3zm-1.5 0v11.9L4 19.5V7.6L7.5 5.3zm11 0v11.9l-3.5 1.5V7.6l3.5-2.3z" />
                                </svg>
                            </div>
                        </a>
                    </div>
                    <!--end::Col-->
                    
                    <!--begin::Col - Reservas-->
                    <div class="col-lg-3 col-6 mb-4">
                        <a href="{{ route('reservas.index') }}" class="clickable-card">
                            <div class="small-box text-bg-warning stat-card">
                                <div class="inner">
                                    <h3>{{ $totalReservas }}</h3>
                                    <p>Reservas</p>
                                </div>
                                <svg class="small-box-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M7 2a1 1 0 0 0 0 2h1v1a1 1 0 1 0 2 0V4h4v1a1 1 0 1 0 2 0V4h1a1 1 0 0 0 0-2H7zM3 7a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v13a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7zm2 2v11h14V9H5zm2 2h2v2H7v-2zm4 0h2v2h-2v-2z" />
                                </svg>
                            </div>
                        </a>
                    </div>
                    <!--end::Col-->
                    
                    <!--begin::Col - Paquetes-->
                    <div class="col-lg-3 col-6 mb-4">
                        <a href="{{ route('paquetes.index') }}" class="clickable-card">
                            <div class="small-box text-bg-danger stat-card">
                                <div class="inner">
                                    <h3>{{ $totalPaquetes }}</h3>
                                    <p>Paquetes</p>
                                </div>
                                <svg class="small-box-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M9 2a1 1 0 0 0-1 1v2H6a2 2 0 0 0-2 2v13a1 1 0 1 0 2 0v-1h12v1a1 1 0 1 0 2 0V7a2 2 0 0 0-2-2h-2V3a1 1 0 0 0-1-1H9zm1 3V4h4v1h-4zm-4 2h12v10H6V7z" />
                                </svg>
                            </div>
                        </a>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->

                <!--begin::Row - Estadísticas Adicionales-->
                <div class="row">
                    <!--begin::Col - Transportes-->
                    <div class="col-lg-3 col-6 mb-4">
                        <a href="{{ route('transportes.index') }}" class="clickable-card">
                            <div class="info-box bg-info">
                                <span class="info-box-icon"><i class="bi bi-truck"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Transportes</span>
                                    <span class="info-box-number">{{ $totalTransportes }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!--end::Col-->
                    
                    <!--begin::Col - Hoteles-->
                    <div class="col-lg-3 col-6 mb-4">
                        <a href="{{ route('hoteles.index') }}" class="clickable-card">
                            <div class="info-box bg-secondary">
                                <span class="info-box-icon"><i class="bi bi-building"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Hoteles</span>
                                    <span class="info-box-number">{{ $totalHoteles }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!--end::Col-->
                    
                    <!--begin::Col - Restaurantes-->
                    <div class="col-lg-3 col-6 mb-4">
                        <a href="{{ route('restaurantes.index') }}" class="clickable-card">
                            <div class="info-box bg-light">
                                <span class="info-box-icon text-dark"><i class="bi bi-cup-hot"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Restaurantes</span>
                                    <span class="info-box-number">{{ $totalRestaurantes }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!--end::Col-->
                    
                    <!--begin::Col - Reservas Hoy-->
                    <div class="col-lg-3 col-6 mb-4">
                        <a href="{{ route('reservas.index') }}" class="clickable-card">
                            <div class="info-box bg-gradient-primary">
                                <span class="info-box-icon"><i class="bi bi-calendar-check"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Reservas Hoy</span>
                                    <span class="info-box-number">{{ $reservasHoy }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->

                <!--begin::Row - Ingresos e Información-->
                <div class="row">
                    <!--begin::Col - Ingresos del Mes-->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title"><i class="bi bi-cash-coin me-2"></i>Ingresos del Mes</h3>
                            </div>
                            <div class="card-body">
                                <h2 class="text-primary">S/ {{ number_format($ingresosMes, 2) }}</h2>
                                <p class="text-muted mb-1">Reservas este mes: <strong>{{ $reservasMesActual }}</strong></p>
                                <small class="text-muted">{{ now()->format('F Y') }}</small>
                            </div>
                        </div>
                    </div>
                    <!--end::Col-->

                    <!--begin::Col - Últimas Reservas-->
                    <div class="col-md-8 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="bi bi-clock-history me-2"></i>Últimas Reservas</h3>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>Cliente</th>
                                                <th>Paquete</th>
                                                <th>Fecha Inicio</th>
                                                <th>Estado Reserva</th>
                                                <th>Estado Pago</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($ultimasReservas as $reserva)
                                                <tr>
                                                    <td>{{ $reserva->cliente->nombre }}</td>
                                                    <td>{{ Str::limit($reserva->paquete->nombre, 30) }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($reserva->fecha_inicio)->format('d/m/Y') }}</td>
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
                                                    <td><strong>S/ {{ number_format($reserva->precio_total, 2) }}</strong></td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center text-muted py-3">No hay reservas recientes</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->

                <!--begin::Row - Paquetes Populares-->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                <h3 class="card-title"><i class="bi bi-star-fill me-2"></i>Paquetes Más Populares</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @forelse($paquetesPopulares as $paquete)
                                        <div class="col-md-3 mb-3">
                                            <div class="card h-100 shadow-sm">
                                                @if($paquete->imagen)
                                                    <img src="{{ asset('storage/' . $paquete->imagen) }}" 
                                                         class="card-img-top" 
                                                         alt="{{ $paquete->nombre }}"
                                                         style="height: 150px; object-fit: cover;">
                                                @else
                                                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
                                                         style="height: 150px;">
                                                        <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                                                    </div>
                                                @endif
                                                <div class="card-body">
                                                    <h5 class="card-title text-truncate" title="{{ $paquete->nombre }}">
                                                        {{ $paquete->nombre }}
                                                    </h5>
                                                    <p class="card-text">
                                                        <small class="text-muted">
                                                            <i class="bi bi-calendar3"></i> {{ $paquete->duracion }} días
                                                        </small>
                                                    </p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <span class="badge bg-primary">
                                                            {{ $paquete->reservas_count }} reservas
                                                        </span>
                                                        <strong class="text-success">
                                                            S/ {{ number_format($paquete->precio, 2) }}
                                                        </strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12">
                                            <p class="text-center text-muted py-3">No hay paquetes disponibles</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
    <!--end::App Main-->
@endsection

@push('js')
@endpush
