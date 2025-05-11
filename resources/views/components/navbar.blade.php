
<nav class="bg-gray-100 border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('components.index') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('img/dnw.png') }}" class="h-15" alt="Logo" />
        </a>
        <div class="">
            <p class="text-xl font-bold">PERFORMANCE DIVITION</p>
        </div>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" fill="none" viewBox="0 0 17 14" xmlns="http://www.w3.org/2000/svg">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-gray-100 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                {{-- <li>
                    <a href="{{ route('components.index') }}"
                        class="block py-2 px-3 rounded-md {{ request()->routeIs('components.index') ? 'bg-gray-300 dark:bg-gray-700 text-black dark:text-white' : 'text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }}">
                        Home
                    </a>
                </li> --}}
                {{-- <li>
                    <a href="{{ route('components.admin.dashboard') }}"
                        class="block py-2 px-3 rounded-md {{ request()->routeIs('components.dashboard') ? 'bg-gray-300 dark:bg-gray-700 text-black dark:text-white' : 'text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }}">
                        Report
                    </a>
                </li> --}}
                {{-- <li>
                    <a href="#"
                        class="block py-2 px-3 rounded-md text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        Services
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 rounded-md text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        Pricing
                    </a>
                </li>--}}
                <li> 
                    <a href="{{route('components.admin.login')}}"
                        class="block py-2 px-3 rounded-md text-white bg-blue-500 dark:text-white dark:hover:bg-gray-700">
                        Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
