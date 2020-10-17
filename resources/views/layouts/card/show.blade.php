<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>create card</title>

  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="bg-blue-500">
  <div class="flex justify-center">
    <div class=" flex justify-center bg-white rounded-lg shadow-lg w-3/5 mt-12">
      <div class="">
        <img class="rounded-full border-2 bg-cover h-56 w-56 mt-10 border-teal-700" src="{{asset('storage/' . $card->image)}}" alt="">
        <h1 class="text-teal-700  text-center font-bold text-4xl my-6">{{$card->name}}</h1>
        <p>{{$card->score}}</p>
      </div>
    </div>
  </div>
</body>
</html>
