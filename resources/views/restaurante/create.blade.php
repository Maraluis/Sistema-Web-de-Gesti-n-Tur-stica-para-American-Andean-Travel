@extends('template')
@section('title', 'Crear restaurante')
@push('css')
@endpush
@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Crear restaurante</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('panel.index') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('restaurantes.index') }}">Restaurantes</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Crear</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Crear nuevo restaurante</div>
                </div>
                <form action="{{ route('restaurantes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <!-- Nombre -->
                            <div class="mb-3 col-md-6">
                                <label for="nombre" class="form-label">Nombre del restaurante <span class="text-danger">*</span>:</label>
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

                            <!-- Tipo de cocina -->
                            <div class="mb-3 col-md-4">
                                <label for="tipo_cocina" class="form-label">Tipo de cocina <span class="text-danger">*</span>:</label>
                                <input type="text" class="form-control" id="tipo_cocina" name="tipo_cocina" value="{{ old('tipo_cocina') }}" placeholder="Ej: Italiana, Peruana, Internacional..." required />
                                @error('tipo_cocina')
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

                            <!-- Precio promedio -->
                            <div class="mb-3 col-md-4">
                                <label for="precio_promedio" class="form-label">Precio promedio <span class="text-danger">*</span>:</label>
                                <input type="number" step="0.01" class="form-control" id="precio_promedio" name="precio_promedio" value="{{ old('precio_promedio') }}" required />
                                @error('precio_promedio')
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

                            <!-- Horario -->
                            <div class="mb-3 col-md-6">
                                <label for="horario" class="form-label">Horario:</label>
                                <input type="text" class="form-control" id="horario" name="horario" value="{{ old('horario') }}" placeholder="Ej: 12:00 - 23:00" />
                                @error('horario')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Especialidades -->
                            <div class="mb-3 col-md-12">
                                <label for="especialidades" class="form-label">Especialidades:</label>
                                <input type="text" class="form-control" id="especialidades" name="especialidades" value="{{ old('especialidades') }}" placeholder="Ej: Ceviche, Lomo Saltado, Anticuchos..." />
                                @error('especialidades')
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
                                <label for="imagen" class="form-label">Imagen del restaurante:</label>
                                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" />
                                @error('imagen')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('restaurantes.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
@push('js')
@endpush
