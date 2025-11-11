<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Guia;
use App\Models\Paquete;
use App\Models\Reserva;
use App\Models\Transporte;
use App\Models\Hotel;
use App\Models\Restaurante;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(){
        // Estadísticas principales
        $totalClientes = Cliente::count();
        $totalGuias = Guia::count();
        $totalReservas = Reserva::count();
        $totalPaquetes = Paquete::count();
        $totalTransportes = Transporte::count();
        $totalHoteles = Hotel::count();
        $totalRestaurantes = Restaurante::count();
        
        // Reservas de hoy
        $reservasHoy = Reserva::whereDate('fecha_reserva', Carbon::today())->count();
        
        // Reservas del mes actual
        $reservasMesActual = Reserva::whereMonth('fecha_reserva', Carbon::now()->month)
                                    ->whereYear('fecha_reserva', Carbon::now()->year)
                                    ->count();
        
        // Ingresos del mes (solo reservas pagadas)
        $ingresosMes = Reserva::whereMonth('fecha_reserva', Carbon::now()->month)
                              ->whereYear('fecha_reserva', Carbon::now()->year)
                              ->where('estado_pago', 'pagado')
                              ->sum('precio_total');
        
        // Últimas 5 reservas
        $ultimasReservas = Reserva::with(['cliente', 'paquete'])
                                  ->latest()
                                  ->take(5)
                                  ->get();
        
        // Paquetes más vendidos (top 5)
        $paquetesPopulares = Paquete::withCount('reservas')
                                    ->orderBy('reservas_count', 'desc')
                                    ->take(5)
                                    ->get();
        
        // Datos para gráfico de reservas por mes (últimos 6 meses)
        $reservasPorMes = [];
        for ($i = 5; $i >= 0; $i--) {
            $mes = Carbon::now()->subMonths($i);
            $count = Reserva::whereMonth('fecha_reserva', $mes->month)
                           ->whereYear('fecha_reserva', $mes->year)
                           ->count();
            $reservasPorMes[] = [
                'mes' => $mes->format('M Y'),
                'cantidad' => $count
            ];
        }
        
        return view('panel.index', compact(
            'totalClientes',
            'totalGuias',
            'totalReservas',
            'totalPaquetes',
            'totalTransportes',
            'totalHoteles',
            'totalRestaurantes',
            'reservasHoy',
            'reservasMesActual',
            'ingresosMes',
            'ultimasReservas',
            'paquetesPopulares',
            'reservasPorMes'
        ));
    }
}
