<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show MCQs</title>

    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="min-h-screen bg-gradient-to-r from-purple-600 via-pink-500 to-blue-500">

<x-navbar :name="$name" />

<div class="max-w-3xl mx-auto mt-8 p-4">

    <!-- Top Card -->
    <div class="bg-white rounded-xl shadow-lg p-4 text-center mb-6 border">
        <h2 class="text-xl font-semibold text-green-600">
            All Quiz MCQs
        </h2>

        <p class="text-gray-700 mt-1">
            Total Questions : {{ count($mcqs) }}
        </p>

        <a href="/add-quiz" 
           class="text-blue-500 text-sm underline mt-2 inline-block">
           ← Go Back
        </a>
    </div>

    <!-- MCQ List -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border">

        <!-- Header -->
        <div class="flex bg-gray-200 p-3 font-semibold text-gray-700">
            <div class="w-1/6">ID</div>
            <div class="w-3/6">Question</div>
        
        </div>

        <!-- Data -->
        @foreach($mcqs as $mcq)
        <div class="flex p-3 border-t hover:bg-gray-100 transition">
            <div class="w-1/6 text-gray-600">{{ $mcq->id }}</div>
            <div class="w-3/6 text-gray-800">{{ $mcq->question }}</div>

            
        </div>
        @endforeach

    </div>

</div>

</body>
</html>