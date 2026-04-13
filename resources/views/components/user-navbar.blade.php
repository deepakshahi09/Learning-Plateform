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

      <a class="text-gray-600 font-medium hover:text-blue-600 transition duration-300" href="categories-list">
        Categories
      </a>

    @if(Session::has('user'))

      <a class="text-gray-600 font-medium hover:text-blue-600 transition duration-300" href="/user-details">
        Welcome {{ Session::get('user')->name }}
      </a>
      
      <a class="text-gray-600 font-medium hover:text-blue-600 transition duration-300" href="/user-logout">
        Log Out
      </a>

    @else

      <!-- ✅ LOGIN DROPDOWN -->
      <div class="relative">
        <button onclick="toggleLoginDropdown()" 
            class="text-gray-600 font-medium hover:text-blue-600 transition duration-300">
            Login
        </button>

        <!-- Dropdown -->
        <div id="loginDropdown" class="hidden absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg z-50">

            <a href="{{ url('user-login') }}" 
               class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
               👤 User Login
            </a>

            <a href="{{ url('admin-login') }}" 
               class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
               🛠 Admin Login
            </a>

        </div>
      </div>

      <a class="text-gray-600 font-medium hover:text-blue-600 transition duration-300" href="/user-signup">
        Signup
      </a>

    @endif

      <a class="text-gray-600 font-medium hover:text-blue-600 transition duration-300" href="/contact">
        Contact 
      </a>

    </div>
   </div>
</nav>

<!-- ✅ SCRIPT -->
<script>
function toggleLoginDropdown(){
    document.getElementById('loginDropdown').classList.toggle('hidden');
}

// click outside → close dropdown
window.addEventListener('click', function(e){
    let dropdown = document.getElementById('loginDropdown');
    if(!e.target.closest('.relative')){
        if(dropdown){
            dropdown.classList.add('hidden');
        }
    }
});
</script>