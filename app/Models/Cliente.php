<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Cliente extends Model
{
    use Traits\Scope;

    protected $guarded = ['id'];

    public $timestamps = false;

    /**
     * Attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "nome",
        "cnpj",
        "cpf",
        "data_cadastro",
        "email",
        "status"
               
    ];

      /**
     * Get the grupo associated with the cliente.
     */
    public function grupo(): HasOne
    {
        return $this->hasOne(Grupo::class);
    }
}