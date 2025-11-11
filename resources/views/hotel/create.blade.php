@extends('template')
@section('title', 'Crear hotel')
@push('css')
@endpush
@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Crear hotel</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('hoteles.index') }}">Hoteles</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Crear</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Crear nuevo hotel</div>
                </div>
                <form action="{{ route('hoteles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <!-- Nombre -->
                            <div class="mb-3 col-md-6">
                                <label for="nombre" class="form-label">Nombre del hotel <span class="text-danger">*</span>:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required />
                                @error('nombre')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Dirección -->
                            <div class="mb-3 col-md-6">
                                <label for="direccion" class="form-label">Dirección <span class="text-danger">*</span>:</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion') }}" required />
                                @error('direccion')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Ciudad -->
                            <div class="mb-3 col-md-4">
                                <label for="ciudad" class="form-label">Ciudad <span class="text-danger">*</span>:</label>
                                <input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ old('ciudad') }}" required />
                                @error('ciudad')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- País -->
                            <div class="mb-3 col-md-4">
                                <label for="pais" class="form-label">País <span class="text-danger">*</span>:</label>
                                <input type="text" class="form-control" id="pais" name="pais" value="{{ old('pais') }}" required />
                                @error('pais')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Estrellas -->
                            <div class="mb-3 col-md-4">
                                <label for="estrellas" class="form-label">Estrellas <span class="text-danger">*</span>:</label>
                                <select class="form-select" id="estrellas" name="estrellas" required>
                                    <option value="">Seleccione...</option>
                                    <option value="1" {{ old('estrellas') == 1 ? 'selected' : '' }}>⭐</option>
                                    <option value="2" {{ old('estrellas') == 2 ? 'selected' : '' }}>⭐⭐</option>
                                    <option value="3" {{ old('estrellas') == 3 ? 'selected' : '' }}>⭐⭐⭐</option>
                                    <option value="4" {{ old('estrellas') == 4 ? 'selected' : '' }}>⭐⭐⭐⭐</option>
                                    <option value="5" {{ old('estrellas') == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐</option>
                                </select>
                                @error('estrellas')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Teléfono -->
                            <div class="mb-3 col-md-4">
                                <label for="telefono" class="form-label">Teléfono:</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}" />
                                @error('telefono')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-3 col-md-4">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" />
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Precio por noche -->
                            <div class="mb-3 col-md-4">
                                <label for="precio_noche" class="form-label">Precio por noche <span class="text-danger">*</span>:</label>
                                <input type="number" step="0.01" class="form-control" id="precio_noche" name="precio_noche" value="{{ old('precio_noche') }}" required />
                                @error('precio_noche')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Capacidad -->
                            <div class="mb-3 col-md-6">
                                <label for="capacidad" class="form-label">Capacidad (personas) <span class="text-danger">*</span>:</label>
                                <input type="number" class="form-control" id="capacidad" name="capacidad" value="{{ old('capacidad') }}" required />
                                @error('capacidad')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Servicios -->
                            <div class="mb-3 col-md-6">
                                <label for="servicios" class="form-label">Servicios:</label>
                                <input type="text" class="form-control" id="servicios" name="servicios" value="{{ old('servicios') }}" placeholder="WiFi, Piscina, Gimnasio..." />
                                @error('servicios')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Descripción -->
                            <div class="mb-3 col-md-12">
                                <label for="descripcion" class="form-label">Descripción:</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ old('descripcion') }}</textarea>
                                @error('descripcion')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Imagen -->
                            <div class="mb-3 col-md-12">
                                <label for="imagen" class="form-label">Imagen del hotel:</label>
                                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" />
                                @error('imagen')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('hoteles.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
@push('js')
@endpush
