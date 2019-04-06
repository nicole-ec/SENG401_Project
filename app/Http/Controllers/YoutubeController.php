<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class YoutubeController extends Controller
{
    public function index($subject)
    {
      $apikey = 'AIzaSyDYlh_ORyvZm3HrDFNRt24RZZCrfB531ks';
      $googleApiUrl = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=' . $subject . '&maxResults=' . 10 . '&type=video&key=' . $apikey;

      $ch = curl_init();

      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
      curl_setopt($ch, CURLOPT_VERBOSE, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $response = curl_exec($ch);

      curl_close($ch);
      $data = json_decode($response);
      $results = json_decode(json_encode($data), true);
      $results = $results['items'];
    //  dd($results);
     return view('index', compact('subject', 'results'));
    }

    public function indexkeyword($subject, Request $request)
    {
      $query = $subject . "" . $request->keyword;
      $subject = $subject . " " . $request->keyword;
      $query = str_replace(' ', ',', $subject);

      $apikey = 'AIzaSyDYlh_ORyvZm3HrDFNRt24RZZCrfB531ks';
      $googleApiUrl = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=' . $query . '&maxResults=' . 10 . '&type=video&key=' . $apikey;

      $ch = curl_init();

      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
      curl_setopt($ch, CURLOPT_VERBOSE, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $response = curl_exec($ch);

      curl_close($ch);
      $data = json_decode($response);
      $results = json_decode(json_encode($data), true);
      $results = $results['items'];
      //dd($results);
      return view('index', compact('subject','results'));
    }

    public function video($id){
      return view('video',compact('id'));
    }


}
