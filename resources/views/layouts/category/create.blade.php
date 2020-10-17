<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <title>create</title>
</head>
<body class="bg-blue-500">
  <div class="flex justify-center">
    <div class="bg-white w-2/3 p-5 my-10 rounded-lg shadow-lg">
      <h3 class="text-gray-600 mx-3 font-bold text-xl">Create Category</h3>
      <div class="border border-indigo-300 mx-4 my-3"></div>
      <div class="flex justify-center">
        <form method="post" action="/categories/" >
          @csrf
          <div class="flex flex-col">
            <label class="text-gray-700" for="name">name :</label>
            <input id="name" class="bg-gray-200 rounded-lg my-2 py-1 px-3 border border-blue-600 text-gray-700 focus:text-white focus:bg-blue-500 " name="name" type="text" placeholder="enter name">
            <input class="bg-blue-500 rounded-lg my-3 py-2 w-2/5 text-white" type="submit" value="add"/>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
