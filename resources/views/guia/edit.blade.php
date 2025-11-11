@extends('template')
@section('title', 'Editar guía de turismo')

@push('css')
@endpush

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Editar guía de turismo</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('guias.index') }}">Guías</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Editar</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="card card-primary card-outline mb-4">
                <form action="{{ route('guias.update', $guia->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="nombres" class="form-label">Nombres:</label>
                                <input type="text" class="form-control" id="nombres" name="nombres"
                                    value="{{ old('nombres', $guia->nombres) }}">
                                @error('nombres')
                                    <small class="text-danger">*.{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="especialidad" class="form-label">Especialidad:</label>
                                <input type="text" class="form-control" id="especialidad" name="especialidad"
                                    value="{{ old('especialidad', $guia->especialidad) }}">
                                @error('especialidad')
                                    <small class="text-danger">*.{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="idiomas" class="form-label">Idiomas:</label>
                                <input type="text" class="form-control" id="idiomas" name="idiomas"
                                    value="{{ old('idiomas', $guia->idiomas) }}">
                                @error('idiomas')
                                    <small class="text-danger">*.{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="telefono" class="form-label">Teléfono:</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono"
                                    placeholder="Ej: +51 987654321" pattern="^\+?\d{7,15}$"
                                    value="{{ old('telefono', $guia->telefono) }}">
                                @error('telefono')
                                    <small class="text-danger">*.{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Correo electrónico:</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', $guia->email) }}">
                                @error('email')
                                    <small class="text-danger">*.{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="foto" class="form-label">Foto:</label>
                                <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                                @if ($guia->foto)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $guia->foto) }}" alt="Foto del guía" class="img-thumbnail" width="120">
                                    </div>
                                @endif
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
