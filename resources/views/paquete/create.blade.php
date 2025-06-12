@extends('template')
@section('title', 'Crear paquete')

@push('css')
@endpush

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Crear paquete turístico</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('paquetes.index') }}">Paquetes</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Crear</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Nuevo paquete</div>
                </div>

                <form action="{{ route('paquetes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <!-- Nombre -->
                            <div class="mb-3 col-md-6">
                                <label for="nombre" class="form-label">Nombre del paquete:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
                                @error('nombre')
                                    <small class="text-danger">*.{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Destino -->
                            <div class="mb-3 col-md-6">
                                <label for="destino" class="form-label">Destino:</label>
                                <input type="text" class="form-control" id="destino" name="destino" value="{{ old('destino') }}">
                                @error('destino')
                                    <small class="text-danger">*.{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Precio -->
                            <div class="mb-3 col-md-6">
                                <label for="precio" class="form-label">Precio (S/):</label>
                                <input type="number" class="form-control" id="precio" name="precio" step="0.01" value="{{ old('precio') }}">
                                @error('precio')
                                    <small class="text-danger">*.{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Duración -->
                            <div class="mb-3 col-md-6">
                                <label for="duracion" class="form-label">Duración (días):</label>
                                <input type="number" class="form-control" id="duracion" name="duracion" value="{{ old('duracion') }}">
                                @error('duracion')
                                    <small class="text-danger">*.{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Descripción -->
                            <div class="mb-3 col-12">
                                <label for="descripcion" class="form-label">Descripción:</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="4">{{ old('descripcion') }}</textarea>
                                @error('descripcion')
                                    <small class="text-danger">*.{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Imagen -->
                            <div class="mb-3 col-12">
                                <label for="imagen" class="form-label">Imagen del paquete:</label>
                                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                                @error('imagen')
                                    <small class="text-danger">*.{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="reset" class="btn btn-secondary">Reiniciar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection

@push('js')
@endpush
