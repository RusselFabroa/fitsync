<nav class="bg-[#1A5C34] border-b border-gray-100 shadow-xl">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-[80px]">
            <div class="flex items-center w-full">
                <!-- Logo -->
                <a href="">
                    <div class="flex items-center">
                    <img src="{{ asset('/images/CF FITSYNC-03.png') }}" alt="Logo" class="block py-2 h-20 w-auto text-white">
                    <h1 class="ml-4 text-white font-semi font-bebas text-2xl">FITSYNC | CF Mindoro</h1>
</div>
                </a>

       


                <div id="userDropdown"
                    class="hidden origin-top-right absolute right-0 mt-28 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                    <div class="py-1">
                        <!-- <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a> -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button onclick="toggleDropdown('responsiveNavMenu')"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div id="responsiveNavMenu" class="hidden py-4 sm:hidden">
        <div class="px-4">
       
        </div>
        <div class="px-4">
            <div class="mt-3 space-y-1">
                <a href="/user-dashboard">Dashboard</a>
            </div>
            <div class="mt-3 space-y-1">
                <!-- <a href="{{ route('profile.edit') }}" class="text-gray-800 hover:text-gray-900">Profile</a> -->
            </div>
            <div class="mt-3 space-y-1">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="font-bebas text-gray-800 hover:text-gray-900">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>


    </div>

    <script>
    function toggleDropdown(id) {
        var dropdown = document.getElementById(id);
        dropdown.classList.toggle('hidden');
    }

    document.addEventListener('click', function(event) {
        var responsiveNavMenu = document.getElementById('responsiveNavMenu');
        if (!event.target.closest('.sm:hidden') && !responsiveNavMenu.contains(event.target)) {
            responsiveNavMenu.classList.add('hidden');
        }

        var userDropdown = document.getElementById('userDropdown');
        if (!event.target.closest('.relative') && !userDropdown.contains(event.target)) {
            userDropdown.classList.add('hidden');
        }
    });
    </script>
</nav>

