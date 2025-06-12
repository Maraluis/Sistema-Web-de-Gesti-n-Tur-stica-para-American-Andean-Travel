<?php

namespace App\Http\Controllers;

use App\Models\Transporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transportes = Transporte::all();
        return view('transporte.index', compact('transportes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transporte.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validación básica, puedes personalizar o usar FormRequest
        $request->validate([
            'tipo' => 'required|string|max:255',
            'placa' => 'required|string|max:255|unique:transportes,placa',
            'empresa' => 'nullable|string|max:255',
            'capacidad' => 'required|integer|min:1',
            'estado' => 'required|in:activo,mantenimiento',
        ]);

        try {
            DB::beginTransaction();

            Transporte::create($request->all());

            DB::commit();

            return redirect()->route('transportes.index')->with('success', 'Transporte creado correctamente.');
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
    public function edit(string $id)
    {
        $transporte = Transporte::findOrFail($id);
        return view('transporte.edit', compact('transporte'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transporte = Transporte::findOrFail($id);

        $request->validate([
            'tipo' => 'required|string|max:255',
            'placa' => 'required|string|max:255|unique:transportes,placa,' . $transporte->id,
            'empresa' => 'nullable|string|max:255',
            'capacidad' => 'required|integer|min:1',
            'estado' => 'required|in:activo,mantenimiento',
        ]);

        try {
            DB::beginTransaction();

            $transporte->update($request->all());

            DB::commit();

            return redirect()->route('transportes.index')->with('success', 'Transporte actualizado correctamente.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Error al actualizar el transporte: ' . $th->getMessage()])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transporte = Transporte::findOrFail($id);

        $transporte->delete();

        return redirect()->route('transportes.index')->with('success', 'Transporte eliminado correctamente.');
    }
}
