<?php

namespace App\Scraper;

use App\Film as AppFilm;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class film{
    public function scrapeFilm()
    {   
       $GLOBALS['image'] = '';
        $page = 950;
        for($i = 1; $i <= 950; $i++){
            if($i == 1){
                $url = 'https://www3.himovies.to/movie';
            }else{
                $url = 'https://www3.himovies.to/movie?page='.$i;
            }
            $client = new Client();
            $crawler = $client->request('GET', $url);
            
            $crawler->filter('.flw-item')->each(
               
            function (Crawler $node) {
                if(empty($node->filter('.film-poster .film-poster-quality'))){
                    $quality = 'N/A';
                }else{
                    $quality = $node->filter('.film-poster .film-poster-quality')->text();
                }
                $name = $node->filter('.film-name a')->text();
                $year = $node->filter('.fd-infor .fdi-item')->text();
                $time = $node->filter('.fd-infor .fdi-duration')->text();
                $type = $node->filter('.fd-infor .fdi-type')->text();
                $link = "https://www3.himovies.to" . $node->filter('.film-poster-ahref')->attr("href");
                if($type == "Movie"){
                    $cate_type = 0;
                }else{
                    $cate_type = 1;
                }
                $slug_name = str_slug($name, "-");
                $slug_cate = strtolower($type);
                
                $node->filter('.film-poster-img')->each(function($item){
                    $urlImage = $item->attr("data-src");
                    if(strlen(strstr($urlImage, "https://img.himovies.to/")) > 0){
                        if($urlImage != ''){
                            $filename = basename($urlImage);
                            $contents = file_get_contents($urlImage); // doc toan bo trong link $urlImage
                         $nameImage = "Images/".substr($urlImage, strrpos($urlImage, '/')+1 );
                        }
                        $GLOBALS['image']  =  $nameImage;
                        Storage::put($nameImage, $contents);
                    }else{
                        $GLOBALS['image'] = "";
                    }
                      // luu $contents vao thu mục $nameImage
                   
                });

                // echo  $GLOBALS['image']; exit();
                $film = new AppFilm();
                $film->name = $name;
                $film->quality = $quality;
                $film->year = $year;
                $film->time = $time;
                $film->cate_type = $cate_type;
                $film->slug_name = $slug_name;
                $film->slug_cate = $slug_cate;
                $film->image = $GLOBALS['image'];
                $film->link = $link;
                $film->save();

            }
        );
        }
   

    }
  
    
}