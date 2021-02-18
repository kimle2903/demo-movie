<?php

namespace App\Http\Controllers;

use App\Film;
use App\FilmDetail;
use Illuminate\Http\Request;

class FilmDetailController extends Controller
{
    public function index(Request $request){
        $slug_cate = $request->slug_cate;
        $slug_name = $request->slug_name;
        $id = $request->id;
        $film = Film::find($id);
        $filmDetail = FilmDetail::where('film_id', $id)->first();
        $tags = explode(',',$filmDetail->tags);
        $filmRelated = Film::join('film_detail','films.id',  '=','film_detail.film_id')->where('films.name', 'like', '%'. $film->name.'%')->where('film_detail.film_id','<>', $id)->orWhere('film_detail.country','like',  $filmDetail ->country)->orWhere('film_detail.product_name', 'like', $filmDetail ->product_name)->orWhere('film_detail.genre', 'like','%'. $filmDetail ->genre.'%')->select("films.*")->offset(0)->limit(17)->get();
        // dd($filmRelated);

        return view("film_detail", compact('film', 'filmDetail', 'tags', 'filmRelated'));
    }

     public function generByFilm(Request $request){
        $name = $request->name;
        $name = str_replace('-', ' ', $name);
        $name = ucwords($name);
        $dt = FilmDetail::where('genre', 'like', "%$name%")->get('film_id');
        $data = Film::whereIn('id', $dt)->offset(0)->limit(32)->get();
        // dd($data);
          return view('search', compact('name', 'data'));
    }

    public function countryByFilm(Request $request){
         $nameCountry = $request->name;
        $nameCountry = str_replace('-', ' ', $nameCountry);
        $nameCountry = ucwords($nameCountry);
        $dt = FilmDetail::where('country', 'like', "%$nameCountry%")->get('film_id');
        $data = Film::whereIn('id', $dt)->offset(0)->limit(32)->get();
        // dd($data);
          return view('search', compact('nameCountry', 'data'));
    }
}
