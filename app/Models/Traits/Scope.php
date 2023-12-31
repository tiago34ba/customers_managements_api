<?php

namespace App\Models\Traits;

/**
 * Defining generic scope to be reused in models to assist in queries
 */
trait Scope
{
    public function scopeActive($query)
    {
        return $query->where('status', 'ACTIVE');
    }

    public function scopeDesc($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}