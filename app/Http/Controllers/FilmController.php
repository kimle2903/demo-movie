<?php

namespace App\Http\Controllers;

use App\Country;
use App\Film;
use App\FilmDetail;
use App\Genre;
use Illuminate\Http\Request;


class FilmController extends Controller
{
    public function index(){

        $data = getdate();
        $currentYear = $data['year'];
        $lastYear = $data['year']-1;
        
        $newMovieFilm = Film::where("year", $currentYear)->offset(0)->limit(24)->get();
        
        $actionMovie  =   FilmDetail::join('films', 'film_detail.film_id', '=', 'films.id')->select('films.*')->where('film_detail.genre','like','%action%')->where('films.year', '>=',$lastYear )->offset(0)->limit(24)->get();

        $kidsMovie  =   FilmDetail::join('films', 'film_detail.film_id', '=', 'films.id')->select('films.*')->where('film_detail.genre','like','%Comedy%')->where('films.year', '>=',$lastYear )->offset(0)->limit(24)->get();

        $genre = Genre::get();
        $country = Country::get();

        //  dd($actionMovie );
        
        return view("film", compact('newMovieFilm', 'kidsMovie','actionMovie', 'genre', 'country' ));
    }

    // public function search(Request $request){
    //     $keyword = $request->keyword;
    //     $data = Film::where('name', 'like', '%'.$keyword.'%')->get();
    //     // dd($data);
    //     return $data;
    // }

    public function pageSearch(Request $request, $page = 1){
        $keyword = $request->keyword;
        $keyword = str_replace('-', ' ',$keyword);
        $keywordArr = explode(" ", $keyword );
        $page = $request->page;
        if($page == null){
            $page = 1;
        }
        $countRecord = Film::where(function($query) use($keywordArr,$keyword){
            $query->Where('name', 'like', $keyword);
            foreach($keywordArr as $value) {
                $query->orWhere('name', 'like', "%$value%");
            }
            return $query;
        })->count();
        $pages =(integer)ceil($countRecord/32);
        $data = Film::where(function($query) use($keywordArr,$keyword){
            $query->Where('name', 'like', $keyword);
            foreach($keywordArr as $value) {
                $query->orWhere('name', 'like', "%$value%");
            }
            return $query;
        })->offset(($page-1)*32)->limit(32)->get();
       
        return view('search', compact('keyword', 'data', 'pages'));
    }

   
  
}
