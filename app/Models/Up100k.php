<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Up100k extends Model
{
    use HasFactory;

    public function diskon(){
        return $this->belongsTo(Diskon::class, 'diskon_id');
    }
}
