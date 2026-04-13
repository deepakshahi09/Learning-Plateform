<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    @vite('resources/css/app.css')
</head>


<body class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-sm">
        
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">
             Admin Login
        </h2>
        @error('user')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror

        <!-- ✅ Login error message -->
        @if(session('error'))
            <div class="text-red-500 text-center mb-3">
                {{ session('error') }}
            </div>
        @endif

        <form action="admin-login" method="POST" class="space-y-5">
            @csrf
            
            <!-- Admin Name -->
            <div>
                <label class="block text-gray-600 mb-1">Admin Name</label>
                <input 
                    type="text" 
                    name="name"
                    placeholder="Enter admin name"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                >
                @error('name')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="block text-gray-600 mb-1">Password</label>
                <input 
                    type="password" 
                    name="password"
                    placeholder="Enter password"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                >
                @error('password')   <!-- ✅ FIXED -->
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Button -->
            <button 
                type="submit"
                class="w-full bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700 transition duration-300"
            >
                Login
            </button>

        </form>

        <!-- Footer -->
        <p class="text-center text-gray-500 text-sm mt-4">
            © 2026 Admin Panel
        </p>

    </div>

</body>
</html>