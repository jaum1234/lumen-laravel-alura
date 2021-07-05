<?php

namespace App\Models;

use App\Models\Episodio;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome'];
    protected $perPage = 3;

    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }
}