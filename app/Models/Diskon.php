<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diskon extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function under100ks(){
    //     return $this->hasMany(Under100k::class);
    // }
    public function up100ks(){
        return $this->hasMany(Up100k::class);
    }
}
