<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result</title>

    @vite('resources/css/app.css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-gradient-to-br from-blue-100 to-purple-200 min-h-screen">

<x-user-navbar />

<div class="flex flex-col items-center pt-20 pb-10">

    <!-- Title -->
    <h1 class="text-4xl font-bold text-gray-800 mb-4">
        🎯 Quiz Result
    </h1>
  @if(count($resultData) > 0 && ($correctAnswer * 100 / count($resultData)) > 70)
   <a href="/certificate"
   class="mt-4 inline-block bg-green-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-green-700 hover:shadow-lg transition duration-300">
   🎓 View & Download Certificate
</a>
<br>
@endif

    <!-- Score Card -->
    <div class="bg-white shadow-xl rounded-2xl p-6 mb-8 text-center w-80">
        <h2 class="text-xl font-semibold text-gray-700 mb-2">Your Score</h2>
        <p class="text-3xl font-bold text-green-600">
            {{ $correctAnswer }} / {{ count($resultData) }}
        </p>

        <!-- Progress Bar -->
        @php
            $percentage = (count($resultData) > 0) ? ($correctAnswer / count($resultData)) * 100 : 0;
        @endphp

        <div class="w-full bg-gray-200 rounded-full h-3 mt-4">
            <div class="bg-green-500 h-3 rounded-full" style="width: {{ $percentage }}%"></div>
        </div>

        <p class="text-sm text-gray-500 mt-2">
            {{ round($percentage) }}% Score
        </p>
    </div>

    <!-- Table Container -->
    <div class="w-11/12 md:w-3/4 bg-white shadow-lg rounded-2xl p-6">

        <!-- Header -->
        <div class="grid grid-cols-3 font-semibold bg-gray-100 p-3 rounded-lg mb-4 text-center text-gray-700">
            <div>#</div>
            <div>Question</div>
            <div>Result</div>
        </div>

        <!-- Data -->
        @foreach($resultData as $key => $item)
        <div class="grid grid-cols-3 items-center text-center p-3 rounded-lg mb-2 hover:bg-gray-50 transition">

            <div class="font-medium">{{ $key + 1 }}</div>

            <div class="text-gray-700">
                {{ $item->question }}
            </div>

            <div>
                @if($item->is_correct)
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">
                        ✅ Correct
                    </span>
                @else
                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold">
                        ❌ Incorrect
                    </span>
                @endif
            </div>

        </div>
        @endforeach

    </div>

</div>

<x-footer-user />

</body>
</html>