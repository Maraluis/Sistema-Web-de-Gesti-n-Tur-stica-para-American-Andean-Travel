<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Reserva;
use App\Models\Paquete;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReporteController extends Controller
{
    /**
     * Reporte de cliente/turista individual con su itinerario completo
     */
    public function reporteCliente($id)
    {
        $cliente = Cliente::with(['reservas.paquete.guias', 'reservas.paquete.transportes', 
                                   'reservas.paquete.hoteles', 'reservas.paquete.restaurantes'])
                          ->findOrFail($id);

        $pdf = Pdf::loadView('reportes.cliente', compact('cliente'));
        $pdf->setPaper('a4', 'portrait');
        
        return $pdf->download('reporte_cliente_' . $cliente->nombres . '_' . date('Y-m-d') . '.pdf');
    }

    /**
     * Reporte de todos los clientes
     */
    public function reporteClientes()
    {
        $clientes = Cliente::with('reservas')->get();
        
        $pdf = Pdf::loadView('reportes.clientes', compact('clientes'));
        $pdf->setPaper('a4', 'portrait');
        
        return $pdf->download('reporte_clientes_' . date('Y-m-d') . '.pdf');
    }

    /**
     * Reporte de todas las reservas
     */
    public function reporteTodasReservas()
    {
        $reservas = Reserva::with(['cliente', 'paquete'])
                           ->orderBy('fecha_reserva', 'desc')
                           ->get();
        
        $totalGeneral = $reservas->sum('precio_total');
        $totalPagado = $reservas->where('estado_pago', 'pagado')->sum('precio_total');
        $totalPendiente = $reservas->where('estado_pago', 'pendiente')->sum('precio_total');

        $pdf = Pdf::loadView('reportes.todas_reservas', compact('reservas', 'totalGeneral', 'totalPagado', 'totalPendiente'));
        $pdf->setPaper('a4', 'landscape');
        
        return $pdf->download('reporte_todas_reservas_' . date('Y-m-d') . '.pdf');
    }

    /**
     * Reporte diario de operaciones
     */
    public function reporteDiario(Request $request)
    {
        $fecha = $request->input('fecha', date('Y-m-d'));
        
        $reservas = Reserva::with(['cliente', 'paquete.guias', 'paquete.transportes'])
                           ->whereDate('fecha_reserva', $fecha)
                           ->get();

        $pdf = Pdf::loadView('reportes.diario', compact('reservas', 'fecha'));
        $pdf->setPaper('a4', 'landscape');
        
        return $pdf->download('reporte_diario_' . $fecha . '.pdf');
    }

    /**
     * Reporte de reservas por rango de fechas
     */
    public function reporteReservas(Request $request)
    {
        $fechaInicio = $request->input('fecha_inicio', date('Y-m-01'));
        $fechaFin = $request->input('fecha_fin', date('Y-m-d'));
        
        $reservas = Reserva::with(['cliente', 'paquete'])
                           ->whereBetween('fecha_reserva', [$fechaInicio, $fechaFin])
                           ->get();

        $total = $reservas->sum(function($reserva) {
            return $reserva->paquete->precio;
        });

        $pdf = Pdf::loadView('reportes.reservas', compact('reservas', 'fechaInicio', 'fechaFin', 'total'));
        $pdf->setPaper('a4', 'portrait');
        
        return $pdf->download('reporte_reservas_' . $fechaInicio . '_' . $fechaFin . '.pdf');
    }

    /**
     * Reporte de ingresos
     */
    public function reporteIngresos(Request $request)
    {
        $mes = $request->input('mes', date('Y-m'));
        
        $reservas = Reserva::with(['cliente', 'paquete'])
                           ->whereYear('fecha_reserva', substr($mes, 0, 4))
                           ->whereMonth('fecha_reserva', substr($mes, 5, 2))
                           ->get();

        $totalIngresos = $reservas->sum(function($reserva) {
            return $reserva->paquete->precio;
        });

        $reservasPorPaquete = $reservas->groupBy('paquete_id')->map(function($grupo) {
            return [
                'paquete' => $grupo->first()->paquete->nombre,
                'cantidad' => $grupo->count(),
                'total' => $grupo->sum(function($r) { return $r->paquete->precio; })
            ];
        });

        $pdf = Pdf::loadView('reportes.ingresos', compact('mes', 'totalIngresos', 'reservasPorPaquete'));
        $pdf->setPaper('a4', 'portrait');
        
        return $pdf->download('reporte_ingresos_' . $mes . '.pdf');
    }

    /**
     * Mostrar formulario de reportes
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('reportes.index', compact('clientes'));
    }
}
