<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

    @vite('resources/css/app.css')

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 min-h-screen">

<x-user-navbar />

<div class="flex items-center justify-center min-h-[90vh] px-4">

    <div class="bg-white/90 backdrop-blur-lg p-8 rounded-3xl shadow-2xl w-full max-w-md border border-white/40">
        
        <!-- Heading -->
        <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-6">
            Forgot Password
        </h2>

        <!-- ✅ Success Popup -->
        @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#7c3aed'
            });
        </script>
        @endif

        <!-- ❌ Error Popup -->
        @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}',
                confirmButtonColor: '#ef4444'
            });
        </script>
        @endif

        <!-- Form -->
        <form action="/user-forgot-password" method="POST" class="space-y-5">
            @csrf
           
            <!-- Email Input -->
            <div>
                <input 
                    type="email" 
                    name="email"
                    placeholder="Enter Email Id"
                    value="{{ old('email') }}"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                >

                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <button 
                type="submit"
                onclick="this.disabled=true; this.innerText='Sending...'; this.form.submit();"
                class="w-full bg-gradient-to-r from-purple-500 to-pink-500 text-white py-3 rounded-xl font-semibold text-lg shadow-lg hover:scale-105 hover:shadow-xl transition duration-300"
            >
                Submit
            </button>

        </form>

        <!-- Footer -->
        <p class="text-center text-gray-500 text-sm mt-6">
            © 2026 User Forgot Password Panel
        </p>

    </div>
</div>

</body>
</html>