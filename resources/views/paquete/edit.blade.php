@extends('template')
@section('title', 'Editar paquete')
@push('css')
@endpush

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Editar paquete</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('paquetes.index') }}">Paquetes</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Editar</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="card card-primary card-outline mb-4">
                <form action="{{ route('paquetes.update', $paquete->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="card-body">
                        <div class="row">
                            <!-- Nombre -->
                            <div class="mb-3 col-md-6">
                                <label for="nombre" class="form-label">Nombre del paquete:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    value="{{ old('nombre', $paquete->nombre) }}">
                                @error('nombre')
                                    <small class="text-danger">*.{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Destino -->
                            <div class="mb-3 col-md-6">
                                <label for="destino" class="form-label">Destino:</label>
                                <input type="text" class="form-control" id="destino" name="destino"
                                    value="{{ old('destino', $paquete->destino) }}">
                                @error('destino')
                                    <small class="text-danger">*.{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Precio -->
                            <div class="mb-3 col-md-6">
                                <label for="precio" class="form-label">Precio (S/):</label>
                                <input type="number" class="form-control" id="precio" name="precio" step="0.01"
                                    value="{{ old('precio', $paquete->precio) }}">
                                @error('precio')
                                    <small class="text-danger">*.{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Duración -->
                            <div class="mb-3 col-md-6">
                                <label for="duracion" class="form-label">Duración (días):</label>
                                <input type="number" class="form-control" id="duracion" name="duracion"
                                    value="{{ old('duracion', $paquete->duracion) }}">
                                @error('duracion')
                                    <small class="text-danger">*.{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Descripción -->
                            <div class="mb-3 col-12">
                                <label for="descripcion" class="form-label">Descripción:</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="4">{{ old('descripcion', $paquete->descripcion) }}</textarea>
                                @error('descripcion')
                                    <small class="text-danger">*.{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Imagen actual y carga nueva -->
                            <div class="mb-3 col-12">
                                <label class="form-label">Imagen actual:</label><br>
                                @if ($paquete->imagen)
                                    <img src="{{ asset('storage/' . $paquete->imagen) }}" alt="Imagen paquete" style="max-width: 200px;">
                                @else
                                    <p>No hay imagen cargada</p>
                                @endif
                            </div>

                            <div class="mb-3 col-12">
                                <label for="imagen" class="form-label">Cambiar imagen (opcional):</label>
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
