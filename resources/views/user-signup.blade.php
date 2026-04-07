<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Signup</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 min-h-screen">

<x-user-navbar />

<div class="flex items-center justify-center min-h-[90vh] px-4">

    <div class="bg-white/90 backdrop-blur-lg p-8 rounded-3xl shadow-2xl w-full max-w-md border border-white/40">
        
        <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-6">
             User Signup
        </h2>

        @error('user')
            <div class="text-red-500 text-center mb-3 font-medium">
                {{ $message }}
            </div>
        @enderror

        @if(session('error'))
            <div class="text-red-500 text-center mb-3 font-medium">
                {{ session('error') }}
            </div>
        @endif

        <form action="/user-signup" method="POST" class="space-y-5">
            @csrf
            
            <!-- Name -->
            <div>
                <label class="block text-gray-700 mb-1 font-semibold">User Name</label>
                <input 
                    type="text" 
                    name="name"
                    placeholder="Enter user name"
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                >
                @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label class="block text-gray-700 mb-1 font-semibold">User Email</label>
                <input 
                    type="email" 
                    name="email"
                    placeholder="Enter Email Id"
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                >
                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="block text-gray-700 mb-1 font-semibold">Password</label>
                <input 
                    type="password" 
                    name="password"
                    placeholder="Enter password"
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                >
                @error('password')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label class="block text-gray-700 mb-1 font-semibold">Confirm Password</label>
                <input 
                    type="password" 
                    name="password_confirmation"
                    placeholder="Confirm password"
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                >
                
            </div>

            <!-- Button -->
            <button 
                type="submit"
                class="w-full bg-gradient-to-r from-purple-500 to-pink-500 text-white py-3 rounded-xl font-semibold text-lg shadow-lg hover:scale-105 hover:shadow-xl transition duration-300"
            >
                Sign Up
            </button>

        </form>

        <p class="text-center text-gray-500 text-sm mt-6">
            © 2026 User Panel
        </p>

    </div>
</div>

</body>
</html>