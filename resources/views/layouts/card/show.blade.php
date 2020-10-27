<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>create card</title>

  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="bg-blue-500">
 
  <div class="bg-white flex justify-start items-center">
    <a class="bg-indigo-700 py-2 px-3 text-white rounded-lg m-4" href="/">home</a>
    @auth
   <form action="{{ url('/cards', $card) }}" method="post">
      <input class="bg-red-700 px-3 text-white font-bold font-mono py-2 rounded-lg my-5 mx-3" type="submit" value="Delete" />
      @method('delete')
      @csrf
    </form>
     @endif
  </div>
  <div class="flex justify-center">
    <div class=" flex justify-center bg-white rounded-lg shadow-lg w-full lg:w-3/5 mt-12">
      <div class="lg:flex lg:justify-between lg:items-center ">
        <div class="lg:px-20">
          <img class="rounded-full border-2 bg-cover h-56 w-56 mt-10 border-teal-700" src="{{asset('storage/' . $card->image)}}" alt="">
          <h1 class="text-teal-700  text-center font-bold text-4xl my-6">{{$card->name}}</h1>
        </div>
        <div  class="lg:px-20">
          <p class="text-center text-gray-600 font-mono font-bold">score : {{$card->score}}</p>
          <p class="text-center text-gray-600 font-mono font-bold py-2">category : {{$card->category->name}}</p>
          <p class="text-center text-orange-500 font-mono font-bold text-xl py-2">:توضیحات</p>
          <p class="text-center text-gray-600 font-mono font-bold py-2">{{$card->description}}</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
