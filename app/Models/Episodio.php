<?php

namespace App\Models;

use App\Models\Serie;
use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    public $timestamps = false;

    protected $fillable = ['temporada', 'numero', 'assitido', 'serie_id'];

    protected $appends = ['link'];

    public function serie()
    {
        $this->belongsTo(Serie::class);
    }

    /**
     *  ACCESSORS
     */
    public function getAssitidoAttribute($assitido): bool
    {
        return $assitido;
    }

    public function getLinkAttribute($links): array
    {
        return [
            'self' => '/api/episodios/' . $this->id,
            'serie' => '/api/series/' . $this->serie_id
        ];
    }
}