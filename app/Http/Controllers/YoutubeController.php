<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class YoutubeController extends Controller
{
    public function index($subject)
    {

      return view('index', compact('subject'));
    }

    public function indexkeyword($subject, Request $request)
    {
      $subject = $subject . " " . $request->keyword;

      return view('index', compact('subject'));
    }


}
