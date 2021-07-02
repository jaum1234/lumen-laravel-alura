<?php

namespace App\Models;

use App\Models\Serie;
use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    public $timestamps = false;
    protected $filleble = ['temporada', 'numero', 'assitido', 'serie_id'];

    public function serie()
    {
        $this->belongsTo(Serie::class);
    }
}