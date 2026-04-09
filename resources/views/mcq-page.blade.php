<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCQ Page</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100">

    <!-- Navbar -->
    <x-user-navbar />

    <div class="flex items-center justify-center min-h-screen px-4">

        <!-- Card -->
        <div class="bg-white shadow-2xl rounded-2xl p-8 max-w-lg w-full">

            <!-- Quiz Name -->
            <h1 class="text-3xl md:text-4xl font-bold text-blue-700 mb-4 text-center">
                java 10 mcq
            </h1>

            <!-- Question Number -->
            <h2 class="text-2xl text-center text-green-800 mb-6 font-bold">
                Question No. 3
            </h2>

            <!-- Question -->
            <h3 class="text-green-900 font-bold text-xl mb-4">
                Q.1 What is Java ?
            </h3>

            <!-- Form -->
            <form action="" method="get">

                <!-- Option A -->
                <label for="option_1" class="flex border p-3 mt-2 rounded-xl shadow cursor-pointer 
                              hover:bg-blue-100 hover:border-blue-500 transition duration-200">
                    <input id="option_1" class="form-radio text-blue-500 cursor-pointer" type="radio" name="answer" value="A">
                    <span class="text-green-900 pl-2">Programming Language</span>
                </label>

                <!-- Option B -->
                <label for="option_2" class="flex border p-3 mt-2 rounded-xl shadow cursor-pointer 
                              hover:bg-blue-100 hover:border-blue-500 transition duration-200">
                    <input id="option_2" class="form-radio text-blue-500 cursor-pointer" type="radio" name="answer" value="B">
                    <span class="text-green-900 pl-2">Operating System</span>
                </label>

                <!-- Option C -->
                <label for="option_3" class="flex border p-3 mt-2 rounded-xl shadow cursor-pointer 
                              hover:bg-blue-100 hover:border-blue-500 transition duration-200">
                    <input id="option_3" class="form-radio text-blue-500 cursor-pointer" type="radio" name="answer" value="C">
                    <span class="text-green-900 pl-2">Database</span>
                </label>

                <!-- Option D -->
                <label for="option_4" class="flex border p-3 mt-2 rounded-xl shadow cursor-pointer 
                              hover:bg-blue-100 hover:border-blue-500 transition duration-200">
                    <input id="option_4" class="form-radio text-blue-500 cursor-pointer" type="radio" name="answer" value="D">
                    <span class="text-green-900 pl-2">Browser</span>
                </label>

                <!-- Button -->
                <button type="submit"
                    class="w-full mt-6 bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg transition duration-200">
                    Submit ans and Next
                </button>

            </form>

        </div>

    </div>
    <x-footer-user />


</body>
</html>