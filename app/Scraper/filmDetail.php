<?php

namespace App\Scraper;

use App\Film;
use App\FilmDetail as AppFilmDetail;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class filmDetail{
    public function scraperFilmDetail(){
       
        $client = new Client();
        // $films = Film::where('id', '>', 647)->get();
        $films = Film::get();
        foreach ($films as $film) {
           $url =  $film->link;
            $GLOBALS['film'] = $film;
            $crawler = $client->request('GET', $url);
            $crawler->filter('#app')->each(
                function (Crawler $node){
                    $film_id  =   $GLOBALS['film']->id;
                    $desc = $node->filter('.dp-i-c-right .description')->text();
                    $release = $node->filter('.elements .col-xl-5 .row-line:nth-child(1)')->text();
                    $temp = explode(": ",$release);
                    $released = $temp[1];
                    $GLOBALS['genre'] = '';
                    $GLOBALS['cats'] = '';
                    $GLOBALS['country'] = '';
                    $GLOBALS['product'] = '';
                    $GLOBALS['tag'] = '';
                    // Genre
                
                    $node->filter('.elements .col-xl-5 .row-line:nth-child(2) a')->each(function($nested_node){
                    $GLOBALS['genre'] .=  $nested_node->text().',';
                    });
                    $genre=   rtrim($GLOBALS['genre'],", ");
                
                
                    //Casts
                    $node->filter('.elements .col-xl-5 .row-line:nth-child(3) a')->each(function($nested_node){
                    $GLOBALS['cats'] .=  $nested_node->text().',';
                    });
                    $cats=   rtrim($GLOBALS['cats'],", ");  
                    //Country
                    $node->filter('.elements .col-xl-6 .row-line:nth-child(2) a')->each(function($nested_node){
                        $GLOBALS['country'] .= $nested_node->text().',';
                    });
                    $country =  rtrim($GLOBALS['country'],", "); 
                    
                    //Production
                    $node->filter('.elements .col-xl-6 .row-line:nth-child(3) a')->each(function($nested_node){
                    $GLOBALS['product'] .= $nested_node->text().',';
                    });
                    $products =  rtrim($GLOBALS['product'],", "); 

                    $node->filter('.detail-tags .btn-dtag')->each(function($nested_node){
                        $GLOBALS['tag'] .= $nested_node->text().',';
                    });
                    $tags =  rtrim($GLOBALS['tag'],", "); 
                
                    $trailer = $node->filter('.modal-body #iframe-trailer')->attr("data-src");
                    $image_detail = $node->filter('.cover_follow')->attr('style');
                    $image_detail = substr(  $image_detail,  22, strlen($image_detail)-24);
                    $filmDetail = new AppFilmDetail();
                    $filmDetail->film_id =   $film_id;
                    $filmDetail->desciption = $desc;
                    $filmDetail->released =  $released;
                    $filmDetail->cats =  $cats;
                    $filmDetail->country =  $country;
                    $filmDetail->product_name =  $products;
                    $filmDetail->trailer =  $trailer;
                    $filmDetail->tags =  $tags;
                    $filmDetail->image_poster =  $image_detail;
                    $filmDetail->genre =  $genre;
                    $filmDetail->save();
                    
                }   
            );
        }
        
    }
}