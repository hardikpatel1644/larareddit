<?php

/**
 * Class for news listing
 * @author Hardik Patel <hpca1644@gmail.com>
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class News extends Controller {

    /**
     * Function to execute listing of news from reddit site
     * @param string $category
     * @return string | json
     */
    public function index($category = 'hot') {
        $category = strtolower($category);
        $ssRedditUrl = "https://www.reddit.com/".$category.".json";
        $ssNews = $this->getJsonDataFromReddit($ssRedditUrl);
        $asJson = json_decode($ssNews);
        $asChildrens = $asJson->data->children;
        $asNews = array();
        foreach($asChildrens as $snKey => $asChild)
        {
            $asVal = $asChild->data;
            $asNews[$snKey]['title']=$asVal->title;
            $asNews[$snKey]['url']=$asVal->url;
            $asNews[$snKey]['num_comments']=$asVal->num_comments;
            $asNews[$snKey]['thumbnail']=$asVal->thumbnail;
            $asNews[$snKey]['created']=date('d-m-Y H:i:s',$asVal->created);
            $asNews[$snKey]['author']=$asVal->author;
            $asNews[$snKey]['score']=$asVal->score;
         }
        $ssNews = json_encode($asNews);
        return $ssNews;
    }

    /**
     * Function to get json data from reddit site
     * @param string $ssUrl
     * @return string | json
     */
    protected function getJsonDataFromReddit($ssUrl) {
        if ($ssUrl != '') {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $ssUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            $ssResult = curl_exec($ch);
            curl_close($ch);
            return $ssResult;
        }
    }
}
