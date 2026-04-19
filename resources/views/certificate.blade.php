<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>

    @vite('resources/css/app.css')

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body class="bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 min-h-screen">

    <!-- Navbar -->
    @include('components.user-navbar')

    <!-- Main Section -->
    
    <div class="flex justify-center items-center py-16">
        

        <!-- Certificate Card -->
        <div class="bg-white w-[800px] p-10 rounded-2xl shadow-2xl border-4 border-yellow-400 text-center">

            <!-- downlode button hai -->
             <a href="/downlode-certificate"
   class="inline-flex items-center gap-2 bg-blue-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-700 hover:shadow-lg transition duration-300">
   <i class="fa-solid fa-download"></i>
   Download
</a>
     <a href="/"
   class="inline-flex items-center gap-2 bg-blue-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-700 hover:shadow-lg transition duration-300">
   <i class="fa-solid fa-download"></i>
   Go Back
</a>
            <h1 class="text-4xl font-bold text-gray-800 mb-4">
                🎓 Certificate of Completion
            </h1>

            <!-- Subtitle -->
            <p class="text-gray-600 mb-6">
                This is to certify that
            </p>

            <!-- Name -->
            <h2 class="text-3xl font-bold text-blue-600 mb-4">
                {{ $name }}
            </h2>

            <!-- Description -->
            <p class="text-gray-700 mb-2">
                has successfully completed the quiz
            </p>

            <!-- Quiz Name -->
            <h3 class="text-2xl font-semibold text-purple-600 mb-6">
                {{ $quiz }}
            </h3>

            <!-- Date -->
            <p class="text-gray-500 mb-8">
                Date: {{ date('d M Y') }}
            </p>

            <!-- Signature -->
<div class="flex justify-between mt-10 px-10">

    <div class="text-center">
        <img src="{{ asset('signature.png') }}" class="mx-auto mb-2 h-12">
        <div class="border-t-2 border-gray-400 w-40 mx-auto"></div>
        <p class="text-sm mt-2 text-gray-600">Instructor</p>
    </div>

    <div class="text-center">
        <img src="{{ asset('signature.png') }}" class="mx-auto mb-2 h-12">
        <div class="border-t-2 border-gray-400 w-40 mx-auto"></div>
        <p class="text-sm mt-2 text-gray-600">Authorized Sign</p>
    </div>

</div>


</div>

            <!-- Download Button -->
          

        </div>
    </div>

    <!-- Footer -->
    @include('components.footer-user')

</body>
</html>