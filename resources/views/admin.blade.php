<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>

  @vite('resources/css/app.css')

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 min-h-screen">

<x-navbar :name="$name" />

<div class="max-w-6xl mx-auto py-10 px-4">

    <!-- Title -->
    <h1 class="text-4xl font-bold text-center text-gray-800 mb-10">
        👨‍💼 Admin Dashboard
    </h1>

    <!-- User Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

        @foreach($users as $key=>$user)

        <div class="bg-white/70 backdrop-blur-lg border border-white/40 rounded-2xl shadow-xl p-6 text-center hover:scale-105 transition duration-300">

            <!-- Profile Image -->
            <img src="https://ui-avatars.com/api/?name={{ $user->name }}" 
                 class="w-20 h-20 rounded-full mx-auto mb-4 shadow-md">

            <!-- Name -->
            <h2 class="text-xl font-bold text-gray-800">
                {{ $user->name }}
            </h2>

            <!-- ID -->
            <p class="text-gray-500 text-sm mt-1">
                ID: {{ $key+1 }}
            </p>

            <!-- Email -->
            <p class="text-gray-600 text-sm mt-2 break-words">
                {{ $user->email }}
            </p>

            <!-- Buttons -->
            <div class="flex justify-center gap-3 mt-4">

                <button class="bg-blue-500 text-white px-3 py-1 rounded-lg hover:bg-blue-600">
                    <i class="fa-solid fa-eye"></i>
                </button>

                <button class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600">
                    <i class="fa-solid fa-trash"></i>
                </button>

            </div>

        </div>

        @endforeach

    </div>
    <div>
      {{$users->links()}}
    </div>
    

</div>

</body>
</html>