<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Cliente;
use GuzzleHttp\Client;
use Illuminate\Database\Console\Migrations\RollbackCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        //dd($clientes);
        return view('cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClienteRequest $request)
    {
        try {
            DB::beginTransaction();
            $cliente = Cliente::create($request->validated());
            DB::commit();
            return redirect()->route('clientes.index')->with('success', 'Cliente creado exitosamente.');
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
    public function edit(Cliente $cliente)
    {
        //dd($cliente);
        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        //dd($request->all());
        // Actualizar con los datos validados
        $cliente->update($request->validated());
        // Puedes devolver una respuesta, por ejemplo, redireccionar o retornar JSON
        return redirect()->route('clientes.index', $cliente)
            ->with('success', 'Cliente actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Buscar cliente por ID, si no existe lanzará excepción 404
        $cliente = Cliente::findOrFail($id);

        // Eliminar cliente
        $cliente->delete();

        // Redireccionar con mensaje de éxito
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente.');
    }
}
