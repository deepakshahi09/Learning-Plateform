<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start Quiz</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100">

    <!-- Navbar -->
    <x-user-navbar />

    <div class="flex items-center justify-center min-h-screen px-4">

        <!-- Card -->
        <div class="bg-white shadow-2xl rounded-2xl p-8 max-w-lg w-full text-center">

            <!-- Quiz Name -->
            <h1 class="text-3xl md:text-4xl font-bold text-blue-700 mb-4">
                {{$quizName}}
            </h1>

            <!-- Quiz Info -->
            <h2 class="text-md md:text-lg text-gray-600 mb-3 font-semibold">
                This Quiz contains {{$quizCount}} Questions
            </h2>

            <p class="text-gray-500 mb-6">
                No limit to attempt this quiz. Try your best!
            </p>

            <!-- Good Luck -->
            <h1 class="text-xl md:text-2xl font-semibold text-green-600 mb-6">
                Good Luck 👍
            </h1>

            <!-- Buttons -->
            <div class="flex flex-col gap-3">

                @if(Session::has('user'))
                <a href="{{ url('mcq/'.session('firstMCQ')->id.'/'.$quizName) }}"
   class="bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg shadow-md transition duration-300">
    Start Quiz
</a>
                @else
                <a href="/user-signup-quiz" 
                   class="bg-green-500 hover:bg-green-600 text-white py-2 rounded-lg shadow-md transition duration-300">
                    SignUp for Start Quiz
                </a>

                <a href="/user-login-quiz" 
                   class="bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg shadow-md transition duration-300">
                    Login for Start Quiz
                </a>
                @endif

            </div>

        </div>

    </div>

</body>
</html>