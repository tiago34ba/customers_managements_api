<?php

namespace App\Services;

use App\Repositories\ClienteRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Cliente;
use GuzzleHttp\Psr7\Request;

class ClienteServices
{
    /**
     * Return initialization page data
     *
     * @return Object
     */
    public function initialize(): Object
    {
        // Your code

        return new \stdClass();
    }

    /**
     * Displays a resource's list
     *
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return ClienteRepository::index();
    }

    /**
    * Get only active resources
    *
    * @return Collection
    */
    public function findActiveClientes(): Collection
    {
        return ClienteRepository::findActiveClientes();
    }

    /**
     * Store a new resource in storage
     *
     * @param \App\Http\Requests\ClienteRequest  $request
     * @return Cliente
     */
    public function store(array $request): Cliente
    {

        return ClienteRepository::store($request);
    }

    /**
     * Update an specific resource in storage.
     *
     * @param \App\Http\Requests\ClienteRequest  $request
     * @param \App\Models\Cliente  $cliente
     * @return bool
     */
    public function update(array $request, $cliente): bool
    {
        return ClienteRepository::update($request, $cliente);
    }

    /**
     * Delete an specific resource from storage.
     *
     * @param \App\Models\Cliente  $cliente
     * @return bool
     */
    public function destroy($cliente): bool
    {
        return ClienteRepository::destroy($cliente);
    }
}