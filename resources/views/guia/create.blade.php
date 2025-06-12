@extends('template')
@section('title', 'Crear guía de turismo')

@push('css')
@endpush

@section('content')
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Crear guía de turismo</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('guias.index') }}">Guías de turismo</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Crear</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="card card-primary card-outline mb-4">
            <div class="card-header">
                <div class="card-title">Crear nuevo guía de turismo</div>
            </div>
            <form action="{{ route('guias.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">

                        <!-- Nombres -->
                        <div class="mb-3 col-md-6">
                            <label for="nombres" class="form-label">Nombres:</label>
                            <input type="text" class="form-control" id="nombres" name="nombres" value="{{ old('nombres') }}" />
                            @error('nombres')
                                <small class="text-danger">*.{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Especialidad -->
                        <div class="mb-3 col-md-6">
                            <label for="especialidad" class="form-label">Especialidad:</label>
                            <input type="text" class="form-control" id="especialidad" name="especialidad" value="{{ old('especialidad') }}" />
                            @error('especialidad')
                                <small class="text-danger">*.{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Idiomas -->
                        <div class="mb-3 col-md-6">
                            <label for="idiomas" class="form-label">Idiomas:</label>
                            <input type="text" class="form-control" id="idiomas" name="idiomas" value="{{ old('idiomas') }}" />
                            @error('idiomas')
                                <small class="text-danger">*.{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Teléfono -->
                        <div class="mb-3 col-md-6">
                            <label for="telefono" class="form-label">Teléfono:</label>
                            <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ej: +51 987654321" pattern="^\+?\d{7,15}$" value="{{ old('telefono') }}" />
                            @error('telefono')
                                <small class="text-danger">*.{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Correo electrónico:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@correo.com" value="{{ old('email') }}" />
                            @error('email')
                                <small class="text-danger">*.{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Foto -->
                        <div class="mb-3 col-md-6">
                            <label for="foto" class="form-label">Foto:</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*" />
                            @error('foto')
                                <small class="text-danger">*.{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection

@push('js')
@endpush
