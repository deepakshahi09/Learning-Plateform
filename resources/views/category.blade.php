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

    <!-- Center Section -->
    <div class="flex items-center justify-center min-h-screen">

        <!-- Glass Card -->
        <div class="backdrop-blur-lg bg-white/20 border border-white/30 p-8 rounded-3xl shadow-2xl w-full max-w-md">

            <!-- Heading -->
            <h2 class="text-4xl font-extrabold text-center text-white mb-6">
                ✨ Add Category
            </h2>

            <!-- Form -->
            <form action="add-category" method="POST" onsubmit="return validateForm()" class="space-y-6">
                @csrf

                <!-- Input -->
                <div>
                    <input 
                        type="text" 
                        id="category"
                        name="category"
                        placeholder="Enter category name..."
                        class="w-full px-5 py-3 rounded-xl bg-white/80 text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-purple-300 transition duration-300"
                    >

                    @error('category')
                        <div class="text-red-300 mt-1 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Button -->
                <button 
                    type="submit"
                    class="w-full bg-gradient-to-r from-purple-500 to-pink-500 text-white py-3 rounded-xl font-semibold text-lg shadow-lg hover:scale-105 transition duration-300"
                >
                    ➕ Add Category
                </button>
            </form>

            <!-- Footer -->
            <p class="text-center text-white/80 text-sm mt-6">
                Manage your categories easily 🚀
            </p>

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