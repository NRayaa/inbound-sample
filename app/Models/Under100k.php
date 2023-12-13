<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Under100k extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function diskon(){
        return $this->belongsTo(Diskon::class, 'diskon_id');
    }
}
