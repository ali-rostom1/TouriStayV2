
<!-- Navbar -->
<nav class="bg-blue-600 text-white shadow-lg">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <a href="{{route('home')}}" ><x-application-logo class="block h-16 w-auto fill-current text-gray-800 "/></a>
        <div class="flex items-center space-x-4">
            @role('tourist|landlord')
            <a href="{{ route('home') }}" class="hover:text-yellow-300">Accueil</a>
            <a href="{{ route('listings.index') }}" class="hover:text-yellow-300">Explorer</a>
            @role('tourist')
            {{-- <a href="{{ route('favorites')}}" class="hover:text-yellow-300">Favoris</a>  --}}
            @else
            <a href="{{ route('myListings')}}" class="hover:text-yellow-300">My Listings</a>
            <a href="{{ route('listings.create')}}" class="hover:text-yellow-300">Publish</a>
            <a href="{{ route('myReservations')}}" class="hover:text-yellow-300">Reservations</a>
            @endrole
            @else
            <a href="{{ route('admin.listings')}}" class="hover:text-yellow-300">View listings</a>
            <a href="{{ route('reservations.index')}}" class="hover:text-yellow-300">View Reservations</a>            
            <a href="{{ route('transactions.index')}}" class="hover:text-yellow-300">View Transactions</a>            
            @endrole
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>
