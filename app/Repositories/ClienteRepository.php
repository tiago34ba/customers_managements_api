<?php

namespace App\Repositories;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Cliente;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ClienteRepository
{
    public function __construct()
    {
    }

    /**
     * @return LengthAwarePaginator
     */
    public static function index(): LengthAwarePaginator
    {
        return Cliente::paginate();
    }

    /**
     * @return Collection
     */
    public static function findActiveClientes($columns = ['id','name']): Collection
    {
        return Cliente::active()
            ->get($columns);
    }

    /**
     * @return Cliente
     */
    public static function store($arrayCliente): Cliente
    {
        return Cliente::create($arrayCliente);
    }

    /**
     * @return bool
     */
    public static function update($arrayCliente, $cliente): bool
    {
        return $cliente->update($arrayCliente);
    }

    /**
     * @return bool
     */
    public static function destroy($cliente): bool
    {
        return $cliente->delete();
    }

}