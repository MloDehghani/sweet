<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{$category->name}}</title>
</head>
<body>
  <p>{{$category->id}}</p>
  <p>{{$category->name}}</p>

  <hr>

  <div>
  <p>cards</p>
    @foreach($cards as $card )
     <a href="{{$card->path()}}">{{$card->name}}</a>
    @endforeach
  </div>
</body>
</html>
