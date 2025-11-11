<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RestauranteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurantes = Restaurante::latest()->paginate(10);
        return view('restaurante.index', compact('restaurantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('restaurante.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string',
            'ciudad' => 'required|string',
            'pais' => 'nullable|string',
            'tipo_cocina' => 'nullable|string',
            'telefono' => 'nullable|string',
            'email' => 'nullable|email',
            'capacidad' => 'nullable|integer',
            'precio_promedio' => 'nullable|numeric',
            'horario' => 'nullable|string',
            'especialidades' => 'nullable|string',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('imagen')) {
            $archivo = $request->file('imagen');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            
            // Crear directorio si no existe
            if (!file_exists(public_path('storage/restaurantes'))) {
                mkdir(public_path('storage/restaurantes'), 0777, true);
            }
            
            // Guardar directamente en public/storage/restaurantes
            $archivo->move(public_path('storage/restaurantes'), $nombreArchivo);
            
            $validated['imagen'] = 'restaurantes/' . $nombreArchivo;
        }

        Restaurante::create($validated);

        return redirect()->route('restaurantes.index')
            ->with('success', 'Restaurante creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurante $restaurante)
    {
        return view('restaurante.show', compact('restaurante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurante $restaurante)
    {
        return view('restaurante.edit', compact('restaurante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restaurante $restaurante)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string',
            'ciudad' => 'required|string',
            'pais' => 'nullable|string',
            'tipo_cocina' => 'nullable|string',
            'telefono' => 'nullable|string',
            'email' => 'nullable|email',
            'capacidad' => 'nullable|integer',
            'precio_promedio' => 'nullable|numeric',
            'horario' => 'nullable|string',
            'especialidades' => 'nullable|string',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('imagen')) {
            // Eliminar imagen anterior si existe
            if ($restaurante->imagen) {
                $rutaAnterior = public_path('storage/' . $restaurante->imagen);
                if (file_exists($rutaAnterior)) {
                    unlink($rutaAnterior);
                }
            }
            
            // Guardar nueva imagen
            $archivo = $request->file('imagen');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            
            // Crear directorio si no existe
            if (!file_exists(public_path('storage/restaurantes'))) {
                mkdir(public_path('storage/restaurantes'), 0777, true);
            }
            
            // Guardar directamente en public/storage/restaurantes
            $archivo->move(public_path('storage/restaurantes'), $nombreArchivo);
            
            $validated['imagen'] = 'restaurantes/' . $nombreArchivo;
        }

        $restaurante->update($validated);

        return redirect()->route('restaurantes.index')
            ->with('success', 'Restaurante actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurante $restaurante)
    {
        // Eliminar imagen asociada si existe
        if ($restaurante->imagen) {
            $rutaImagen = public_path('storage/' . $restaurante->imagen);
            if (file_exists($rutaImagen)) {
                unlink($rutaImagen);
            }
        }
        
        $restaurante->delete();

        return redirect()->route('restaurantes.index')
            ->with('success', 'Restaurante eliminado exitosamente.');
    }
}
