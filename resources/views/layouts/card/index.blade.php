<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <title>Document</title>
</head>
<body class="bg-blue-500">
  <div class="flex justify-center">
    <div class="bg-white w-2/3 p-5 my-10 rounded-lg shadow-lg">
      <div class="my-3 flex items-center justify-between ">
        <h3 class="text-gray-600 mx-3 font-bold text-xl">Cards</h3>
        <div class="mr-3 bg-green-400 py-1 px-3 rounded-full">
          <a href="/cards/create/" class="flex items-center justify-between">
            <svg class="fill-current text-white inline-block h-5 mr-2 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <path d="M11 9h4v2h-4v4H9v-4H5V9h4V5h2v4zm-1 11a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16z"/>
            </svg>
            <p class="text-white ">add</p>
          </a>
        </div>
      </div>
      <div class="border border-indigo-300 mx-4 my-3"></div>
      <div class="flex justify-center">
        <div class="w-3/5 m-5">
          @foreach($items as $item)
            <div class="text-center my-5 bg-teal-500 rounded-lg">
              <div class="flex justify-between px-5 items-center">
                <div class="w-1/3 py-1">
                  <img class="h-32 w-32 bg-auto rounded-full bg-white" src="{{asset('storage/' . $item->image)}}" alt="">
                </div>
                <div class="w-2/3">
                  <a class="text-white font-bold text-xl" href="{{$item->path()}}">{{$item->name}}</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</body>
</html>
