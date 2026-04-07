<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz List</title>

    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="min-h-screen bg-gradient-to-r from-purple-600 via-pink-500 to-blue-500">

<x-user-navbar />

<div class="max-w-3xl mx-auto mt-8 p-4">

    <!-- Top Card -->
    <div class="bg-white rounded-xl shadow-lg p-4 text-center mb-6 border">
        <h2 class="text-xl font-semibold text-green-600">
            Category Name : {{ $category }}
        </h2>

        
    </div>

    <!-- Quiz List -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border">

        <!-- Header -->
        <div class="flex bg-gray-200 p-3 font-semibold text-gray-700">
            <div class="w-1/4">Quiz ID</div>
            <div class="w-2/4">Name</div>
            <div class="w-1/4 text-center">Action</div>
        </div>

        <!-- Data -->
        @foreach($quizData as $item)
        <div class="flex p-3 border-t hover:bg-gray-100 transition items-center">
            
            <div class="w-1/4 text-gray-600">
                {{ $item->id }}
            </div>

            <div class="w-2/4 text-gray-800">
                {{ $item->name }}
            </div>

            <!-- Action Button -->
            <div class="w-1/4 text-center">
                <a href="{{ url('start-quiz/'.$item->id.'/'.$item->name) }}"
                   class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600">
                   Attempt Quiz
                </a>
            </div>

        </div>
        @endforeach

    </div>

</div>

</body>
</html>