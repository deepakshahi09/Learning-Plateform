<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>

    @vite('resources/css/app.css')

    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 min-h-screen">

    <!-- Navbar -->
    <x-navbar :name="$name" />

    <!-- Success Message -->
    @if(session('category'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('category') }}',
                confirmButtonColor: '#7c3aed'
            });
        </script>
    @endif

    <!-- MAIN CONTAINER -->
    <div class="flex flex-col items-center justify-start mt-6 space-y-10 px-4">

        <!-- ================= ADD CATEGORY BOX ================= -->
        <div class="backdrop-blur-lg bg-white/20 border border-white/30 p-8 rounded-3xl shadow-2xl w-full max-w-md">

            <h2 class="text-4xl font-extrabold text-center text-white mb-6">
                ✨ Add Category
            </h2>

            <form action="add-category" method="POST" onsubmit="return validateForm()" class="space-y-6">
                @csrf

                <input 
                    type="text" 
                    id="category"
                    name="category"
                    placeholder="Enter category name..."
                    class="w-full px-5 py-3 rounded-xl bg-white/80 text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-purple-300 transition duration-300"
                >

                @error('category')
                    <div class="text-red-300 text-sm">
                        {{ $message }}
                    </div>
                @enderror

                <button 
                    type="submit"
                    class="w-full bg-gradient-to-r from-purple-500 to-pink-500 text-white py-3 rounded-xl font-semibold text-lg shadow-lg hover:scale-105 transition duration-300"
                >
                    ➕ Add Category
                </button>
            </form>

            <p class="text-center text-white/80 text-sm mt-6">
                Manage your categories easily 🚀
            </p>

        </div>

        <!-- ================= CATEGORY TABLE ================= -->
        <div class="w-full max-w-5xl bg-white/20 backdrop-blur-lg border border-white/30 rounded-3xl shadow-2xl p-6">

            <h1 class="text-3xl font-bold text-white mb-6 text-center">
                📋 Category List
            </h1>

            <!-- Header -->
            <div class="grid grid-cols-4 text-white font-semibold bg-white/10 p-3 rounded-xl mb-3 text-center">
                <div>S.No</div>
                <div>Name</div>
                <div>Creator</div>
                <div>Action</div>
            </div>

            <!-- Data -->
            @foreach($categories as $category)
            <div class="grid grid-cols-4 items-center text-center bg-white/80 text-gray-800 p-3 rounded-xl mb-2 hover:scale-[1.02] transition duration-300 shadow">

                <div class="font-medium">{{$category->id}}</div>
                <div>{{$category->name}}</div>
                <div>{{$category->creator}}</div>

                <li class="flex gap-4 items-center">

    <!-- Delete -->
    <div>
        <a href="category/delete/{{$category->id}}" 
           class="text-red-500 flex items-center gap-1 hover:underline">
           
           🗑️ <span>Delete</span>
        </a>
    </div>

    <!-- View -->
    <div>
        <a href="quiz-list/{{$category->id}}/{{$category->name}}" 
           class="text-blue-500 flex items-center gap-1 hover:underline">
           
           👁️ <span>View</span>
        </a>
    </div>

</li>
                

            </div>
            @endforeach

        </div>

    </div>

    <!-- Validation Script -->
    <script>
        function validateForm() {
            let input = document.getElementById("category").value;

            if(input.trim() === "") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Please enter category name!',
                    confirmButtonColor: '#7c3aed'
                });
                return false;
            }
            return true;
        }
    </script>

</body>
</html>