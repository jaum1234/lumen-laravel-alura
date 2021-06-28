<?php

namespace App\Models;

use App\Models\Serie;
use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    public $timestamps = false;
    protected $filleble = ['temporada', 'numero', 'assitido'];

    public function serie()
    {
        $this->belongsTo(Serie::class);
    }
}