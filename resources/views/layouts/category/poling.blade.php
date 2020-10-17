<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ mix('css/front.css') }}"> 
  <script src="{{ mix('js/front.js') }}" defer></script>
  <title>Document</title>
</head>
<body class="bg-blue-500">
  <!-- <img class="h-32 w-32 bg-auto rounded-full bg-white" src="{{asset('storage/' . $cards->first()->image)}}" alt=""> -->
  <div id="front">
    <Pool :cards='@json($cards)'></Pool>
  </div>
</body>
</html>
