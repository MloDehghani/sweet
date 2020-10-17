<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ mix('css/front.css') }}"> 
  <script src="{{ mix('js/front.js') }}" defer></script>
  <title>Categories</title>
</head>
<body class="bg-blue-500">
<div id="front">
  <categories :items='@json($items)'></categories>
</div>

</body>
</html>
