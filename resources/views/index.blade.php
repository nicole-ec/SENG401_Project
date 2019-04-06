<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>{{ $subject }}</title>

</head>

<!--<script src="https://apis.google.com/js/api.js"></script>-->


<body>
  <div class=container>
    <div class="jumbotron"><h1>{{ $subject }}</h1></div>

    <form method="GET" action="{{ action('YoutubeController@indexkeyword', $subject) }}">

      <div class="form-group">
        <label for="keyword">Add Keyword(s):</label>
        <input type="text" name="keyword" class="form-control">
      </div>

      <div class ="form-group">
        <button type="submit" class="btn btn-primary">Search</button>
      </div>
    </form>



    <div id="displayresults">
      <h2>Search Results: </h2>
    </br>
    @foreach($results as $result)
        <!--<a href="{{ action('YoutubeController@video', $result['id']['videoId']) }}"><u><?php //echo $result['snippet']['title'] ?></u></a>
    </br>-->
    <a href="{{ action('YoutubeController@video', $result['id']['videoId']) }}"><h4 style="color:black;"><?php echo $result['snippet']['title'] ?></h4></a>
    <img src="<?php echo $result['snippet']['thumbnails']['medium']['url'] ?>">
</br> </br>
    @endforeach
    </div>
  </div>
</body>
