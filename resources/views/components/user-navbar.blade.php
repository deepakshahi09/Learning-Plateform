<nav class="bg-white shadow-lg px-6 py-4">
   <div class="flex justify-between items-center">

     <!-- Logo / Title -->
     <div class="text-2xl font-bold text-gray-800 hover:text-blue-600 cursor-pointer transition duration-300">
      Quiz System
    </div>

    <!-- Menu -->
    <div class="flex items-center space-x-6">
        <a class="text-gray-600 font-medium hover:text-blue-600 transition duration-300" href="/">
        Home
      </a>
      <a class="text-gray-600 font-medium hover:text-blue-600 transition duration-300" href="/admin-categories">
        Categories
      </a>

    @if(Session::has('user'))
       

      <a class="text-gray-600 font-medium hover:text-blue-600 transition duration-300" href="">
        Welcome {{ Session::get('user')->name }}
      </a>
      
      <a class="text-gray-600 font-medium hover:text-blue-600 transition duration-300" href="/user-logout">
        Log Out
      </a>
      @else
       

      <a class="text-gray-600 font-medium hover:text-blue-600 transition duration-300" href="/user-login">
        Login
      </a>
      
      <a class="text-gray-600 font-medium hover:text-blue-600 transition duration-300" href="/user-signup">
        Signup
      </a>
      @endif

     

      <a class="bg-red-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-600 transition duration-300" href="admin-logout">
        Blog
      </a>

    </div>
   </div>
  </nav>