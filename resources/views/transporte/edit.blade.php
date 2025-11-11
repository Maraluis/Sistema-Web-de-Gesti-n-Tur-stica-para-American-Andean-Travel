@extends('template')
@section('title', 'Editar transporte')
@push('css')
@endpush
@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Editar transporte</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('transportes.index') }}">Transportes</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Editar</li>
                        </ol>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <div class="app-content">
            <div class="card card-primary card-outline mb-4">
                <!--begin::Form-->
                <form action="{{ route('transportes.update', $transporte->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="row">
                            <!-- Tipo -->
                            <div class="mb-3 col-md-6">
                                <label for="tipo" class="form-label">Tipo:</label>
                                <input type="text" class="form-control" id="tipo" name="tipo"
                                    value="{{ old('tipo', $transporte->tipo) }}" />
                                @error('tipo')
                                    <small class="text-danger">*.{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Placa -->
                            <div class="mb-3 col-md-6">
                                <label for="placa" class="form-label">Placa:</label>
                                <input type="text" class="form-control" id="placa" name="placa"
                                    value="{{ old('placa', $transporte->placa) }}" />
                                @error('placa')
                                    <small class="text-danger">*.{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Empresa -->
                            <div class="mb-3 col-md-6">
                                <label for="empresa" class="form-label">Empresa (opcional):</label>
                                <input type="text" class="form-control" id="empresa" name="empresa"
                                    value="{{ old('empresa', $transporte->empresa) }}" />
                                @error('empresa')
                                    <small class="text-danger">*.{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Capacidad -->
                            <div class="mb-3 col-md-6">
                                <label for="capacidad" class="form-label">Capacidad:</label>
                                <input type="number" class="form-control" id="capacidad" name="capacidad" min="1"
                                    value="{{ old('capacidad', $transporte->capacidad) }}" />
                                @error('capacidad')
                                    <small class="text-danger">*.{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Estado -->
                            <div class="mb-3 col-md-6">
                                <label for="estado" class="form-label">Estado:</label>
                                <select class="form-select" id="estado" name="estado">
                                    <option value="activo" {{ old('estado', $transporte->estado) === 'activo' ? 'selected' : '' }}>Activo</option>
                                    <option value="mantenimiento" {{ old('estado', $transporte->estado) === 'mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
                                </select>
                                @error('estado')
                                    <small class="text-danger">*.{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    <!--end::Footer-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </main>
@endsection
@push('js')
@endpush
