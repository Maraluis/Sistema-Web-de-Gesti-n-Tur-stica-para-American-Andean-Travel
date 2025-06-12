<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservaRequest;
use App\Http\Requests\UpdateReservaRequest;
use App\Models\Cliente;
use App\Models\Paquete;
use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener reservas con relaciones para mostrar en index
        $reservas = Reserva::with(['cliente', 'paquete'])->orderBy('fecha_reserva', 'desc')->paginate(10);

        return view('reserva.index', compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener clientes y paquetes para el select
        $clientes = Cliente::orderBy('nombres')->get();
        $paquetes = Paquete::orderBy('nombre')->get();

        return view('reserva.create', compact('clientes', 'paquetes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function Store(StoreReservaRequest $request)
    {
        // Crear reserva con datos validados
        Reserva::create($request->validated());

        return redirect()->route('reservas.index')->with('success', 'Reserva creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reserva = Reserva::with(['cliente', 'paquete'])->findOrFail($id);

        return view('reserva.show', compact('reserva'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reserva = Reserva::findOrFail($id);
        $clientes = Cliente::orderBy('nombres')->get();
        $paquetes = Paquete::orderBy('nombre')->get();

        return view('reserva.edit', compact('reserva', 'clientes', 'paquetes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservaRequest $request, string $id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->update($request->validated());

        return redirect()->route('reservas.index')->with('success', 'Reserva actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();

        return redirect()->route('reservas.index')->with('success', 'Reserva eliminada correctamente.');
    }
}
