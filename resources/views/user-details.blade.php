<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details page</title>

    @vite('resources/css/app.css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-gradient-to-br from-blue-50 to-gray-100">

<x-user-navbar />

<div class="flex flex-col min-h-screen items-center pt-20 px-4">

    <!-- Heading -->
    <h1 class="text-4xl font-bold text-gray-800 mb-8">
        📊 Attempted Quiz
    </h1>

    <!-- Card Container -->
    <div class="w-full max-w-5xl bg-white rounded-3xl shadow-2xl p-6">

        <!-- Table Header -->
        <div class="grid grid-cols-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-semibold p-4 rounded-xl mb-4 text-center">
            <div>S.No</div>
            <div>Quiz Name</div>
            <div>Status</div>
        </div>

        <!-- Data -->
        @foreach($quizRecord as $key => $record)
        <div class="grid grid-cols-3 items-center text-center bg-gray-50 p-4 rounded-xl mb-3 hover:shadow-lg hover:scale-[1.01] transition duration-300">

            <!-- S.No -->
            <div class="font-semibold text-gray-700">
                {{$key + 1}}
            </div>

            <!-- Name -->
            <div class="font-medium text-gray-800">
                {{$record->name}}
            </div>

            <!-- Status -->
            <div>
                @if($record->status == 2)
                    <span class="px-3 py-1 text-sm font-semibold text-green-700 bg-green-100 rounded-full">
                        ✔ Completed
                    </span>
                @else
                    <span class="px-3 py-1 text-sm font-semibold text-red-700 bg-red-100 rounded-full">
                        ⏳ Incomplete
                    </span>
                @endif
            </div>

        </div>
        @endforeach

        <!-- Empty State -->
        @if(count($quizRecord) == 0)
        <div class="text-center text-gray-500 py-10">
            <i class="fa-solid fa-face-sad-tear text-4xl mb-3"></i>
            <p>No Quiz Attempted Yet</p>
        </div>
        @endif

    </div>

</div>

<x-footer-user />

</body>
</html>