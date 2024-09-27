<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    // Relación polimórfica que indica que una imagen puede pertenecer a diferentes modelos.
    public function imageable()
    {
        return $this->morphTo(); 
    }
}

