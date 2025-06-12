<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGuiaRequest;
use App\Http\Requests\UpdateGuiaRequest;
use App\Models\Guia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guias = Guia::all();
        //dd($guias);
        return view('guia.index', compact('guias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guia.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGuiaRequest  $request)
    {
        //dd($request);
        try {
            DB::beginTransaction();

            $data = $request->validated();

            if ($request->hasFile('foto')) {
                $data['foto'] = $request->file('foto')->store('fotos_guias', 'public');
            }

            Guia::create($data);

            DB::commit();

            return redirect()->route('guias.index')->with('success', 'Guía de turismo creado exitosamente.');
        } catch (\Throwable $th) {
            DB::rollBack();
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
    public function edit(Guia $guia)
    {
        return view('guia.edit', compact('guia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGuiaRequest $request, Guia $guia)
    {
        try {
            // Validar y obtener datos
            $datos = $request->validated();

            // Si hay una nueva foto, puedes manejarla aquí (opcional)
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto')->store('guias', 'public');
                $datos['foto'] = $foto;
            }

            // Actualizar guía
            $guia->update($datos);

            return redirect()->route('guias.index')
                ->with('success', 'Guía actualizada correctamente.');
        } catch (\Throwable $th) {
           
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Buscar cliente por ID, si no existe lanzará excepción 404
        $guia = Guia::findOrFail($id);

        // Eliminar cliente
        $guia->delete();

        // Redireccionar con mensaje de éxito
        return redirect()->route('guias.index')->with('success', 'Guia eliminado correctamente.');
    }
}
