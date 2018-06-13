<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <title>Cruds</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;,
            height: 100%;
            width: 100%;
            background-color: #d1d1d1
        }
        #mute {
            position: absolute;
        }
        #mute.on {
            opacity: 0.7;
            z-index: 1000;
            background: white;
            height: 100%;
            width: 100%;
        }
    </style>
</head>
<body>
<!-- <div class="jumbotron jumbotron-fluid">
  <div class="container" id="jumbotron">
    <div id="mute"></div>
    <div id="app"></div>
  </div>
</div> -->
<div class="jumbotron jumbotron-fluid">
  <div class="container" id="jumbotron">
  </div>
</div>

<!-- <script src="jquery.inline-styler.js"></script> -->
<script src="js/app.js"></script>
<script>
</script>
</body>
</html>
