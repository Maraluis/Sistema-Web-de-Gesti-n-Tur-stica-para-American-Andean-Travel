<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hoteles = Hotel::latest()->paginate(10);
        return view('hotel.index', compact('hoteles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hotel.create');
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
            'estrellas' => 'nullable|integer|min:1|max:5',
            'telefono' => 'nullable|string',
            'email' => 'nullable|email',
            'precio_noche' => 'nullable|numeric',
            'capacidad' => 'nullable|integer',
            'servicios' => 'nullable|string',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('imagen')) {
            $archivo = $request->file('imagen');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            
            // Crear directorio si no existe
            if (!file_exists(public_path('storage/hoteles'))) {
                mkdir(public_path('storage/hoteles'), 0777, true);
            }
            
            // Guardar directamente en public/storage/hoteles
            $archivo->move(public_path('storage/hoteles'), $nombreArchivo);
            
            $validated['imagen'] = 'hoteles/' . $nombreArchivo;
        }

        Hotel::create($validated);

        return redirect()->route('hoteles.index')
            ->with('success', 'Hotel creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotele)
    {
        return view('hotel.show', compact('hotele'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotele)
    {
        return view('hotel.edit', compact('hotele'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hotel $hotele)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string',
            'ciudad' => 'required|string',
            'pais' => 'nullable|string',
            'estrellas' => 'nullable|integer|min:1|max:5',
            'telefono' => 'nullable|string',
            'email' => 'nullable|email',
            'precio_noche' => 'nullable|numeric',
            'capacidad' => 'nullable|integer',
            'servicios' => 'nullable|string',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('imagen')) {
            // Eliminar imagen anterior si existe
            if ($hotele->imagen) {
                $rutaAnterior = public_path('storage/' . $hotele->imagen);
                if (file_exists($rutaAnterior)) {
                    unlink($rutaAnterior);
                }
            }
            
            // Guardar nueva imagen
            $archivo = $request->file('imagen');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            
            // Crear directorio si no existe
            if (!file_exists(public_path('storage/hoteles'))) {
                mkdir(public_path('storage/hoteles'), 0777, true);
            }
            
            // Guardar directamente en public/storage/hoteles
            $archivo->move(public_path('storage/hoteles'), $nombreArchivo);
            
            
            $validated['imagen'] = 'hoteles/' . $nombreArchivo;
        }

        $hotele->update($validated);

        return redirect()->route('hoteles.index')
            ->with('success', 'Hotel actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotele)
    {
        // Eliminar imagen asociada si existe
        if ($hotele->imagen) {
            $rutaImagen = public_path('storage/' . $hotele->imagen);
            if (file_exists($rutaImagen)) {
                unlink($rutaImagen);
            }
        }

        $hotele->delete();        return redirect()->route('hoteles.index')
            ->with('success', 'Hotel eliminado exitosamente.');
    }
}
