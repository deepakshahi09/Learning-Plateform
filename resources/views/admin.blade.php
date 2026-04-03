<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  @vite('resources/css/app.css')
</head>
<body>
  <nav class="bg-white shadow-md px-4 py-3">
   <div class="flex justify-between item-center">
     <div class="text-2xl text-gray-700 hover:text-blue-500 curer-pointer">
      Quiz System
    </div>
    <div class="space-x-4">
      <a class = "text-gray-700 hover:blue 500"href="">Categories</a>
      <a class = "text-gray-700 hover:blue 500" href="">Quiz</a>
      <a class = "text-gray-700 hover:blue 500" href="">Welcome {{$name}}</a>
      <a class = "text-gray-700 hover:blue 500" href="">Log Out</a>
    </div>
   </div>
  </nav>
  
</body>
</html>