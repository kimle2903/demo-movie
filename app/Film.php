<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\FilmDetail;

class Film extends Model
{
    protected $table = "films";

    public function filmDetail(){
        return $this->belongsTo(FilmDetail::class, 'film_id');
    }
}
