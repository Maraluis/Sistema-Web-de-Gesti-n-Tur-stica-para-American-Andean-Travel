@extends('template')

@section('title', 'Panel')

@push('css')

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
                <!--begin::Row-->
                <div class="row">
                    <!--begin::Col-->
                    <div class="col-lg-3 col-6">
                        <!--begin::Small Box Widget 1-->
                        <div class="small-box text-bg-primary">
                            <div class="inner">
                                <?php
                                use App\Models\Cliente;
                                $clientes = count(Cliente::all());
                                ?>
                                <h3>{{ $clientes }}</h3>
                                <p>Clientes</p>
                            </div>
                            <svg class="small-box-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M16 11c1.66 0 3-1.34 3-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zm-8 0c1.66 0 3-1.34 3-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z" />
                            </svg>

                            <a href="{{ route('clientes.index') }}"
                                class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                Ver <i class="bi bi-link-45deg"></i>
                            </a>
                        </div>
                        <!--end::Small Box Widget 1-->
                    </div>
                    <!--end::Col-->
                    <div class="col-lg-3 col-6">
                        <!--begin::Small Box Widget 2-->
                        <div class="small-box text-bg-success">
                            <div class="inner">
                                <?php
                                use App\Models\Guia;
                                $guias = count(Guia::all());
                                ?>
                                <h3>{{ $guias }}</h3>
                                <p>Guias</p>
                            </div>
                            <svg class="small-box-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M20.5 3l-5.5 2.5L9 3 3.5 5.5v16l5.5-2.5 6 2.5 5.5-2.5v-16zM9 5.3l6 2.5v11.9l-6-2.5V5.3zm-1.5 0v11.9L4 19.5V7.6L7.5 5.3zm11 0v11.9l-3.5 1.5V7.6l3.5-2.3z" />
                            </svg>

                            <a href="{{ route('guias.index') }}"
                                class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                Ver <i class="bi bi-link-45deg"></i>
                            </a>
                        </div>
                        <!--end::Small Box Widget 2-->
                    </div>
                    <!--end::Col-->
                    <div class="col-lg-3 col-6">
                        <!--begin::Small Box Widget 3-->
                        <div class="small-box text-bg-warning">
                            <div class="inner">
                                <?php
                                use App\Models\Reserva;
                                $reservas = count(Reserva::all());
                                ?>
                                <h3>{{ $reservas }}</h3>
                                <p>Reservas</p>
                            </div>
                            <svg class="small-box-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M7 2a1 1 0 0 0 0 2h1v1a1 1 0 1 0 2 0V4h4v1a1 1 0 1 0 2 0V4h1a1 1 0 0 0 0-2H7zM3 7a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v13a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7zm2 2v11h14V9H5zm2 2h2v2H7v-2zm4 0h2v2h-2v-2z" />
                            </svg>

                            <a href="{{ route('reservas.index') }}"
                                class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                                Ver <i class="bi bi-link-45deg"></i>
                            </a>
                        </div>
                        <!--end::Small Box Widget 3-->
                    </div>
                    <!--end::Col-->
                    <div class="col-lg-3 col-6">
                        <!--begin::Small Box Widget 4-->
                        <div class="small-box text-bg-danger">
                            <div class="inner">
                                <?php
                                use App\Models\Paquete;
                                $paquetes = count(Paquete::all());
                                ?>
                                <h3>{{ $paquetes }}</h3>
                                <p>Paquetes</p>
                            </div>
                            <svg class="small-box-icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M9 2a1 1 0 0 0-1 1v2H6a2 2 0 0 0-2 2v13a1 1 0 1 0 2 0v-1h12v1a1 1 0 1 0 2 0V7a2 2 0 0 0-2-2h-2V3a1 1 0 0 0-1-1H9zm1 3V4h4v1h-4zm-4 2h12v10H6V7z" />
                            </svg>

                            <a href="{{ route('paquetes.index') }}"
                                class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                Ver <i class="bi bi-link-45deg"></i>
                            </a>
                        </div>
                        <!--end::Small Box Widget 4-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::App Content-->
    </main>
    <!--end::App Main-->
@endsection

@push('js')
@endpush
