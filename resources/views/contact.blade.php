<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

    @vite('resources/css/app.css')

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- ✅ SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 min-h-screen">

    <!-- Navbar -->
    @include('components.user-navbar')

    <!-- Main Section -->
    <div class="flex items-center justify-center px-4 py-12">

        <div class="w-full max-w-5xl grid md:grid-cols-2 bg-white/70 backdrop-blur-xl shadow-2xl rounded-3xl overflow-hidden transition-all duration-500 hover:scale-[1.01]">

            <!-- LEFT -->
            <div class="bg-gradient-to-br from-blue-600 to-purple-600 text-white p-10 flex flex-col justify-center relative">

                <h2 class="text-4xl font-bold mb-4">Get in Touch</h2>
                <p class="mb-8 opacity-90">We’d love to hear from you anytime!</p>

                <div class="space-y-4 text-lg">
                    <p class="flex items-center gap-3 hover:translate-x-2 transition duration-300">
                        <i class="fas fa-envelope"></i> deepakkumar9525442@gmail.com
                    </p>
                    <p class="flex items-center gap-3 hover:translate-x-2 transition duration-300">
                        <i class="fas fa-phone"></i> +91 9525442580
                    </p>
                    <p class="flex items-center gap-3 hover:translate-x-2 transition duration-300">
                        <i class="fas fa-map-marker-alt"></i> Punjab India
                    </p>
                </div>

                <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-white/20 rounded-full blur-3xl"></div>
            </div>

            <!-- RIGHT -->
            <div class="p-10">

                <h2 class="text-3xl font-semibold mb-6 text-gray-700">Send Message ✉️</h2>

                <!-- ✅ SweetAlert Success -->
                @if(session('success'))
                <script>
                    Swal.fire({
                        title: 'Message Sent!',
                        text: 'Thank you for contacting us 😊',
                        icon: 'success',
                        confirmButtonColor: '#6366f1'
                    });
                </script>
                @endif

                <form action="/contact" method="POST" class="space-y-5">
                    @csrf

                    <!-- Name -->
                    <div>
                        <input type="text" name="name" placeholder="Your Name"
                            value="{{ old('name') }}"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:scale-[1.02] transition duration-300">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <input type="email" name="email" placeholder="Your Email"
                            value="{{ old('email') }}"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:scale-[1.02] transition duration-300">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Message -->
                    <div>
                        <textarea name="message" rows="4" placeholder="Your Message"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 focus:scale-[1.02] transition duration-300">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Button -->
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 rounded-lg font-semibold 
                        hover:scale-[1.03] hover:shadow-xl transition duration-300 active:scale-95">
                        🚀 Send Message
                    </button>

                </form>
            </div>

        </div>
    </div>

    <!-- Footer -->
    @include('components.footer-user')

</body>
</html>