<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservaRequest;
use App\Http\Requests\UpdateReservaRequest;
use App\Models\Cliente;
use App\Models\Paquete;
use App\Models\Reserva;
use App\Models\Guia;
use App\Models\Transporte;
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
        $datos = $request->validated();
        
        // Calcular precio total basado en el paquete y número de personas
        $paquete = Paquete::find($datos['paquete_id']);
        if ($paquete) {
            $numPersonas = $datos['num_personas'] ?? 1;
            $datos['precio_total'] = $paquete->precio * $numPersonas;
            $datos['num_personas'] = $numPersonas;
            
            // Calcular fecha_fin basándose en fecha_inicio
            $fechaInicio = \Carbon\Carbon::parse($datos['fecha_inicio']);
            $datos['fecha_fin'] = $fechaInicio->copy()->addDays($paquete->duracion);
        }
        
        // Crear reserva con datos calculados
        Reserva::create($datos);

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
        $datos = $request->validated();
        
        // Calcular precio total basado en el paquete y número de personas
        if (isset($datos['paquete_id']) && isset($datos['num_personas'])) {
            $paquete = Paquete::find($datos['paquete_id']);
            if ($paquete) {
                $datos['precio_total'] = $paquete->precio * $datos['num_personas'];
                
                // Calcular fecha_fin basándose en fecha_inicio
                if (isset($datos['fecha_inicio'])) {
                    $fechaInicio = \Carbon\Carbon::parse($datos['fecha_inicio']);
                    $datos['fecha_fin'] = $fechaInicio->copy()->addDays($paquete->duracion);
                }
            }
        } elseif (isset($datos['paquete_id'])) {
            $paquete = Paquete::find($datos['paquete_id']);
            if ($paquete) {
                $numPersonas = $datos['num_personas'] ?? $reserva->num_personas ?? 1;
                $datos['precio_total'] = $paquete->precio * $numPersonas;
                
                // Recalcular fecha_fin si hay cambio de paquete
                if (isset($datos['fecha_inicio'])) {
                    $fechaInicio = \Carbon\Carbon::parse($datos['fecha_inicio']);
                    $datos['fecha_fin'] = $fechaInicio->copy()->addDays($paquete->duracion);
                }
            }
        }
        
        $reserva->update($datos);

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

    /**
     * Obtener guías disponibles para una fecha específica (AJAX)
     */
    public function guiasDisponibles(Request $request)
    {
        $fecha = $request->input('fecha');
        
        // Obtener IDs de guías ya asignados en esa fecha
        $guiasOcupados = Reserva::whereDate('fecha_reserva', $fecha)
            ->with('paquete.guias')
            ->get()
            ->pluck('paquete.guias')
            ->flatten()
            ->pluck('id')
            ->unique();
        
        // Obtener guías disponibles
        $guiasDisponibles = Guia::whereNotIn('id', $guiasOcupados)->get();
        
        return response()->json($guiasDisponibles);
    }

    /**
     * Obtener transportes disponibles para una fecha específica (AJAX)
     */
    public function transportesDisponibles(Request $request)
    {
        $fecha = $request->input('fecha');
        
        // Obtener IDs de transportes ya asignados en esa fecha
        $transportesOcupados = Reserva::whereDate('fecha_reserva', $fecha)
            ->with('paquete.transportes')
            ->get()
            ->pluck('paquete.transportes')
            ->flatten()
            ->pluck('id')
            ->unique();
        
        // Obtener transportes disponibles
        $transportesDisponibles = Transporte::whereNotIn('id', $transportesOcupados)->get();
        
        return response()->json($transportesDisponibles);
    }
}
