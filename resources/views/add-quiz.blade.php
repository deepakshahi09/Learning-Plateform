<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Quiz</title>

    @vite('resources/css/app.css')

    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 min-h-screen flex flex-col">

    <!-- Navbar -->
    <x-navbar :name="$name" />

    <!-- Main Container -->
    <div class="flex justify-center items-center flex-grow px-4">

        <div class="w-full max-w-xl bg-white/20 backdrop-blur-lg rounded-3xl shadow-2xl p-8 border border-white/30">

            @if(!session('quizDetails'))

            <!-- Heading -->
            <h1 class="text-3xl font-bold text-white text-center mb-6">✨ Add Quiz</h1>

            <form action="add-quiz" method="get" onsubmit="return validateForm()" class="space-y-5">
                @csrf

                <!-- Quiz Name -->
                <input 
                    type="text" 
                    name="quiz"
                    placeholder="Enter quiz name..."
                    class="w-full px-5 py-3 rounded-xl bg-white/80 text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-purple-300 transition"
                >

                <!-- Category -->
                <select 
                    name="category_id"
                    class="w-full px-5 py-3 rounded-xl bg-white/80 text-gray-800 focus:outline-none focus:ring-4 focus:ring-purple-300 transition"
                >
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>

                <!-- Button -->
                <button 
                    type="submit"
                    class="w-full bg-gradient-to-r from-purple-500 to-pink-500 text-white py-3 rounded-xl font-semibold text-lg shadow-lg hover:scale-105 hover:shadow-xl transition duration-300"
                >
                    ➕ Add Quiz
                </button>
            </form>

            @else

            <!-- Quiz Name -->
            <div class="text-center mb-4">
                <span class="text-green-400 font-semibold text-2xl">
                    {{ session('quizDetails')->name }}
                </span>
            </div>

            <!-- Heading -->
            <h1 class="text-3xl font-bold text-white text-center mb-6">📝 Add MCQ</h1>

            <form action="add-mcq" method="post" class="space-y-4">
                @csrf

                <!-- Question -->
                <textarea 
                    placeholder="Enter question..."
                    name="quiz"
                    class="w-full px-4 py-3 rounded-xl bg-white/80 focus:outline-none focus:ring-4 focus:ring-purple-300"
                ></textarea>

                <!-- Options -->
                <input type="text" placeholder="Option A" name="a" class="w-full px-4 py-3 rounded-xl bg-white/80 focus:ring-4 focus:ring-purple-300">
                <input type="text" placeholder="Option B" name="b" class="w-full px-4 py-3 rounded-xl bg-white/80 focus:ring-4 focus:ring-purple-300">
                <input type="text" placeholder="Option C" name="c" class="w-full px-4 py-3 rounded-xl bg-white/80 focus:ring-4 focus:ring-purple-300">
                <input type="text" placeholder="Option D" name="d" class="w-full px-4 py-3 rounded-xl bg-white/80 focus:ring-4 focus:ring-purple-300">

                <!-- Right Answer -->
                <select 
                    name="correct_answer"
                    class="w-full px-4 py-3 rounded-xl bg-white/80 focus:ring-4 focus:ring-purple-300"
                >
                    <option>Select right answer</option>
                    <option value="a">A</option>
                    <option value="b">B</option>
                    <option value="c">C</option>
                    <option value="d">D</option>
                </select>

                <!-- Buttons -->
                <div class="flex gap-4">
                    <button 
                        type="submit"
                        name="submit"
                        value="add-more"
                        class="w-1/2 bg-purple-500 text-white py-3 rounded-xl font-semibold shadow-lg hover:scale-105 transition"
                    >
                        ➕ Add More
                    </button>

                    <button 
                        type="submit"
                        value="done"
                        name="submit"
                        class="w-1/2 bg-green-500 text-white py-3 rounded-xl font-semibold shadow-lg hover:scale-105 transition"
                    >
                        ✅ Submit
                    </button>
                </div>

            </form>

            @endif

        </div>

    </div>

</body>
</html>