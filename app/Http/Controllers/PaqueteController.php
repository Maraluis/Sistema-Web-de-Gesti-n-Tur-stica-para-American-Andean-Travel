<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaqueteRequest;
use App\Http\Requests\UpdatePaqueteRequest;
use App\Models\Paquete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaqueteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paquetes = Paquete::all(); // Puedes usar ->all() si no quieres paginación
        return view('paquete.index', compact('paquetes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paquete.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaqueteRequest $request)
    {
        try {
            DB::beginTransaction();

            $datos = $request->validated();

            // Guardar imagen si se subió
            if ($request->hasFile('imagen')) {
                $datos['imagen'] = $request->file('imagen')->store('paquetes', 'public');
            }

            Paquete::create($datos);

            DB::commit();
            return redirect()->route('paquetes.index')->with('success', 'Paquete creado exitosamente.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Ocurrió un error al crear el paquete.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paquete $paquete)
    {
        return view('paquete.edit', compact('paquete'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaqueteRequest $request, Paquete $paquete)
    {
        try {
            $datos = $request->validated();

            if ($request->hasFile('imagen')) {
                $datos['imagen'] = $request->file('imagen')->store('paquetes', 'public');
            }

            $paquete->update($datos);

            return redirect()->route('paquetes.index')->with('success', 'Paquete actualizado correctamente.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar el paquete.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Buscar paquete por ID, si no existe lanzará excepción 404
        $paquete = Paquete::findOrFail($id);

        // Opcional: eliminar imagen asociada si tienes manejo de archivos
        if ($paquete->imagen) {
            // Usar Storage para borrar la imagen
            \Illuminate\Support\Facades\Storage::delete($paquete->imagen);
        }

        // Eliminar paquete
        $paquete->delete();

        // Redireccionar con mensaje de éxito
        return redirect()->route('paquetes.index')->with('success', 'Paquete eliminado correctamente.');
    }
}
