<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    @vite('resources/css/app.css')

    <!-- Font Awesome for search icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

<x-user-navbar />
<div class="flex flex-col min-h-screen items-center bg-gray-100 pt-16">

    <!-- Heading -->
    <h1 class="text-3xl font-semibold text-green-800 mb-6">
        Check Your Skills
    </h1>

    <div class="w-full max-w-md">
        <div class="relative">

            <!-- Input -->
            <input 
                class="w-full px-5 py-3 border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-green-400"
                type="text" 
                placeholder="Search quiz..."
            >

            <!-- Button (Icon fix) -->
            <button class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="currentColor">
                    <path d="M784-120 532-372q-30 26-69 39t-83 13q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-13 83t-39 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/>
                </svg>
            </button>

        </div>
    </div>
    <div class="w-full max-w-5xl bg-white rounded-2xl shadow-lg p-6 mt-10">

    <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">
        📋 Category List
    </h1>

    <!-- Header -->
    <div class="grid grid-cols-4 font-semibold bg-gray-200 p-3 rounded-xl mb-3 text-center">
        <div>S.No</div>
        <div>Name</div>
        <div>Quiz Count</div>
        
        <div>Action</div>
    </div>

    <!-- Data -->
    @foreach($categories as $key=> $category)
    <div class="grid grid-cols-4 items-center text-center bg-white p-3 rounded-xl mb-2 hover:shadow-md transition">

        <div class="font-medium">{{$key +1}}</div>
        <div>{{$category->name}}</div>
        <div>{{$category->quizzes_count}}</div>
        <!-- Actions -->
        <div class="flex justify-center gap-4">
            <!-- View -->
            <a href="user-quiz-list/{{$category->id}}/{{$category->name}}" 
               class="text-blue-500 hover:text-blue-700 flex items-center gap-1">
                👁️ <span>View</span>
            </a>
        </div>

    </div>
    @endforeach

</div>
    

</div>
<x-footer-user />

</body>
</html>