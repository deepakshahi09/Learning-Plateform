<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz System Home Page</title>

    @vite('resources/css/app.css')

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-gradient-to-br from-indigo-100 via-purple-100 to-pink-100">

<x-user-navbar />

<div class="min-h-screen pt-20 px-4">

    <!-- Heading -->
    <h1 class="text-4xl font-bold text-center text-indigo-700 mb-6">
        🚀 Check Your Skills
    </h1>

    <!-- Search -->
    <div class="flex justify-center mb-10">
        <form action="search-quiz" method="get" class="relative w-full max-w-lg">
            <input 
                class="w-full px-6 py-3 pr-12 rounded-full border shadow focus:ring-2 focus:ring-indigo-400 outline-none"
                type="text" 
                name="search"
                placeholder="Search quiz..."
            >
            <button class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>

    <!-- 🔥 CATEGORY SECTION -->
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
        📋 ALL Categories
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 max-w-6xl mx-auto">

        @foreach($categories as $category)
        <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl hover:scale-105 transition duration-300">

            <h3 class="text-xl font-semibold text-gray-800 mb-2">
                {{ $category->name }}
            </h3>

            <p class="text-gray-500 mb-4">
                {{ $category->quizzes_count }} Quizzes
            </p>

          <a href="{{ url('user-quiz-list/'.$category->id.'/'.$category->name) }}"
               class="block text-center bg-gradient-to-r from-green-400 to-green-600 text-white py-2 rounded-lg hover:opacity-90">
                View Quizzes
            </a>

        </div>
        @endforeach

    </div>
   <div class="mt-8 flex justify-center">
        {{ $categories->links() }}
    </div>




<x-footer-user />

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
            title: 'Success 🎉',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonColor: '#6366f1'
        });
    });
</script>
@endif

</body>
</html>