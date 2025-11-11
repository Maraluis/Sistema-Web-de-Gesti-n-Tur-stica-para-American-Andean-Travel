@extends('template')
@section('title', 'Crear cliente')
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
                        <h3 class="mb-0">Editar cliente</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href=" {{ route('panel.index') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('clientes.index') }}">Clientes</a></li>
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
                <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="nombres" class="form-label">Nombres:</label>
                                <input type="text" class="form-control" id="nombres" name="nombres"
                                    value="{{ old('nombres', $cliente->nombres) }}" />
                                @error('nombres')
                                    <small class="text-danger">*.{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="apellidos" class="form-label">Apellidos:</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos"
                                    value="{{ old('apellidos', $cliente->apellidos) }}" />
                                @error('apellidos')
                                    <small class="text-danger">*.{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="tipo_documento" class="form-label">Tipo de documento:</label>
                                <select class="form-select" id="tipo_documento" name="tipo_documento">
                                    <option value="" disabled
                                        {{ old('tipo_documento', $cliente->tipo_documento) === null ? 'selected' : '' }}>
                                        Seleccione una opción</option>

                                    <option value="dni"
                                        {{ old('tipo_documento', $cliente->tipo_documento) === 'dni' ? 'selected' : '' }}>
                                        DNI</option>

                                    <option value="carnet"
                                        {{ old('tipo_documento', $cliente->tipo_documento) === 'carnet' ? 'selected' : '' }}>
                                        Carnet de Extranjería</option>

                                    <option value="pasaporte"
                                        {{ old('tipo_documento', $cliente->tipo_documento) === 'pasaporte' ? 'selected' : '' }}>
                                        Pasaporte</option>

                                    <option value="ptp"
                                        {{ old('tipo_documento', $cliente->tipo_documento) === 'ptp' ? 'selected' : '' }}>
                                        Permiso Temporal de Permanencia (PTP)</option>

                                    <option value="otro"
                                        {{ old('tipo_documento', $cliente->tipo_documento) === 'otro' ? 'selected' : '' }}>
                                        Otro</option>
                                </select>

                                @error('tipo_documento')
                                    <small class="text-danger">*.{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="mb-3 col-md-6">
                                <label for="documento" class="form-label">Número de documento:</label>
                                <input type="text" class="form-control" id="documento" name="documento"
                                    placeholder="Ingrese el número" value="{{ old('documento', $cliente->documento) }}">
                                @error('documento')
                                    <small class="text-danger">*.{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Campo de Correo Electrónico -->
                            <div class="mb-3 col-md-6">
                                <label for="correo" class="form-label">Correo electrónico:</label>
                                <input type="email" class="form-control" id="correo" name="correo"
                                    placeholder="ejemplo@correo.com" value="{{ old('correo', $cliente->correo) }}">
                                @error('correo')
                                    <small class="text-danger">*.{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Campo de Teléfono -->
                            <div class="mb-3 col-md-6">
                                <label for="telefono" class="form-label">Teléfono:</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono"
                                    placeholder="Ej: +51 987654321" pattern="^\+?\d{7,15}$"
                                    value="{{ old('telefono', $cliente->telefono) }}">
                                @error('telefono')
                                    <small class="text-danger">*.{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Campo de Nacionalidad -->
                            <div class="mb-3 col-md-6">
                                <label for="nacionalidad" class="form-label">Nacionalidad:</label>
                                <input type="text" class="form-control" id="nacionalidad" name="nacionalidad"
                                    placeholder="Ej: Peruana, Argentina, etc." value="{{ old('nacionalidad', $cliente->nacionalidad) }}">
                                @error('nacionalidad')
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
