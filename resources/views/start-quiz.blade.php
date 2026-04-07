<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start Quiz</title>
    @vite('resources/css/app.css')
</head>
<body>

    <!-- Navbar -->
    <x-user-navbar />

    <div class="bg-gray-100 flex flex-col items-center justify-center min-h-screen p-5">

        <!-- Quiz Name -->
        <h1 class="text-4xl text-center text-green-800 mb-6 font-bold">
            {{$quizName}}
        </h1>

        <!-- Quiz Info -->
        <h2 class="text-lg text-center text-green-800 mb-4 font-semibold">
            This Quiz contains {{$quizCount}} Questions
        </h2>

        <p class="text-center text-gray-700 mb-6">
            No limit to attempt this quiz. Try your best!
        </p>

        <!-- Good Luck -->
        <h1 class="text-2xl text-center text-green-800 mb-6 font-bold">
            Good Luck 👍
        </h1>

        <!-- Button -->
         @if(Session::has('user'))
        <a type="submit" href="" 
           class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-md shadow-md">
            Start Quiz
        </a>
        @else
        <a type="submit" href="/user-signup-quiz" 
           class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-md shadow-md">
            Login / SignUp to Start Quiz
        </a>
        @endif

    </div>

</body>
</html>