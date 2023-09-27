<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ClienteRequest;
use App\Http\Resources\ClienteResource;
use App\Models\Cliente;
use App\Services\ClienteServices;


class ClienteController extends Controller
{
    /**
     * Return initialization page data
     *
     * @return  \Illuminate\Http\Response
     */
    public function initialize()
    {
        $clienteServices = new ClienteServices();
        $clientes = $clienteServices->initialize();

        return ClienteResource::collection($clientes);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $clienteServices = new ClienteServices();
        $clientes = $clienteServices->index();
        return ClienteResource::collection($clientes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ClienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        if (!$this->allowsPermission("can-add-remove-client")){
            return response()->json("Acess Denied", 403);
        }
        $clienteServices = new ClienteServices();
        $cliente = $clienteServices->store($request->validated());
        return new ClienteResource($cliente);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return new ClienteResource($cliente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ClienteRequest  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, Cliente $cliente)
    {
    if (!$this->allowsPermission("can-add-remove-client")){
            return response()->json("Acess Denied", 403);
        }
        $clienteServices = new ClienteServices();
        $updated = $clienteServices->update($request->validated(), $cliente);

        if ($updated) {
            return new ClienteResource($cliente);
        }
        return response()->json([], 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        if (!$this->allowsPermission("can-add-remove-client")){
            return response()->json("Acess Denied", 403);
        }
        $clienteServices = new ClienteServices();
        $clienteServices->destroy($cliente);
        return response()->json("DELETED", 204);
    }
}