<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Film;

class FilmDetail extends Model
{
    protected $table = "film_detail";
    public function film(){
        return $this->belongsTo(Film::class, 'film_id');
    }
}
