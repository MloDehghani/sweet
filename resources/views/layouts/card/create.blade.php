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
  <div class="bg-white m-10 p-8 rounded-lg w-4/5 md:w-2/5">
    <form method="post" action="/cards/" enctype="multipart/form-data">
       @csrf
      <h3 class="font-bold text-blue-400">Create Card :</h3>
      
      <div class="border border-t my-4 border-blue-400"></div>

      <div class=" flex flex-col justify-center">
        <label class="text-gray-700" for="name">Enter name :</label>
        <input id="name" class="bg-gray-200 rounded-lg my-5 py-1 px-3 border border-blue-600 text-gray-700 focus:text-white focus:bg-blue-500 "  name="name" type="text" placeholder="Card name"/>

        <input type="file" id="myFile" name="image">
        
        <div class="flex justify-evenly items-baseline">
          <select class=" w-full mr-2 rounded-lg h-8 text-center bg-gray-200 my-5 border border-blue-600 text-gray-700 focus:text-white focus:bg-blue-500" name="category_id">
            @foreach($categories as $category)
              <option class="bg-blue-100 text-gray-600" value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>

          <input class="w-full ml-2 bg-gray-200 rounded-lg my-5 py-1 px-3 border border-blue-600 text-gray-700 text-center focus:text-white focus:bg-blue-500" name="score" type="number" placeholder="enter score"/>
        </div>
        <label class="text-gray-700" for="description">description :</label>
        <textarea id="description" class="bg-gray-200 rounded-lg my-5 py-1 px-3 border border-blue-600 text-gray-700 focus:text-white focus:bg-blue-500 " raws="3" name="description" placeholder="enter description"></textarea>

        <input class="bg-blue-500 rounded-lg py-2 w-2/5 text-white" type="submit" value="save"/>
      </div>
    </form>
  </div>

</div>
</body>
</html>
