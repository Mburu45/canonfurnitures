<nav x-data="{ open: false, categoriesOpen: false }" class="bg-off-white border-b border-charcoal/20 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/" class="text-2xl font-serif font-bold text-oak-brown">Canon Furnitures</a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="/" class="text-charcoal hover:text-oak-brown px-3 py-2 rounded-md text-sm font-medium">Home</a>
                    <a href="/shop" class="text-charcoal hover:text-oak-brown px-3 py-2 rounded-md text-sm font-medium">Shop</a>
                    <a href="/about" class="text-charcoal hover:text-oak-brown px-3 py-2 rounded-md text-sm font-medium">About</a>
                    <a href="/contact" class="text-charcoal hover:text-oak-brown px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                </div>
            </div>

            <!-- Cart and Account -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 space-x-4">
                <a href="/cart" class="text-charcoal hover:text-oak-brown">
                    <i class="fas fa-shopping-cart text-lg"></i>
                </a>
                @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-charcoal bg-off-white hover:text-oak-brown focus:outline-none transition ease-in-out duration-150">
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
                @else
                <a href="/login" class="text-charcoal hover:text-oak-brown px-3 py-2 rounded-md text-sm font-medium">Login</a>
                <a href="/register" class="bg-oak-brown text-off-white hover:bg-dark-oak px-3 py-2 rounded-md text-sm font-medium">Register</a>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-charcoal hover:text-oak-brown hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-oak-brown transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Sidebar -->
    <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex sm:hidden" style="display: none;">
        <div class="fixed inset-0 bg-black bg-opacity-50" @click="open = false"></div>
        <div x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" class="relative flex w-full max-w-xs flex-col bg-off-white pb-12 shadow-xl">
            <div class="flex px-4 pb-2 pt-5">
                <button @click="open = false" class="ml-auto flex h-10 w-10 items-center justify-center rounded-md text-charcoal hover:text-oak-brown">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>
            <div class="flex-1 px-4">
                <nav class="space-y-4">
                    <a href="/" class="block px-3 py-2 text-base font-medium text-charcoal hover:text-oak-brown">Home</a>
                    <a href="/shop" class="block px-3 py-2 text-base font-medium text-charcoal hover:text-oak-brown">Shop</a>
                    <div>
                        <button @click="categoriesOpen = !categoriesOpen" class="flex w-full items-center justify-between px-3 py-2 text-base font-medium text-charcoal hover:text-oak-brown">
                            Categories
                            <i class="fas fa-chevron-down transition-transform" :class="{'rotate-180': categoriesOpen}"></i>
                        </button>
                        <div x-show="categoriesOpen" x-transition class="mt-2 space-y-2 pl-4">
                            <a href="/category/beds" class="block text-sm text-charcoal hover:text-oak-brown">Beds</a>
                            <a href="/category/sofas" class="block text-sm text-charcoal hover:text-oak-brown">Sofas</a>
                            <a href="/category/dining-sets" class="block text-sm text-charcoal hover:text-oak-brown">Dining Sets</a>
                            <a href="/category/tables" class="block text-sm text-charcoal hover:text-oak-brown">Tables</a>
                            <a href="/category/tv-stands" class="block text-sm text-charcoal hover:text-oak-brown">TV Stands</a>
                        </div>
                    </div>
                    <a href="/about" class="block px-3 py-2 text-base font-medium text-charcoal hover:text-oak-brown">About</a>
                    <a href="/contact" class="block px-3 py-2 text-base font-medium text-charcoal hover:text-oak-brown">Contact</a>
                    <a href="/cart" class="block px-3 py-2 text-base font-medium text-charcoal hover:text-oak-brown">Cart</a>
                    @auth
                    <a href="{{ route('profile.edit') }}" class="block px-3 py-2 text-base font-medium text-charcoal hover:text-oak-brown">Account</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-3 py-2 text-base font-medium text-charcoal hover:text-oak-brown">Logout</button>
                    </form>
                    @else
                    <a href="/login" class="block px-3 py-2 text-base font-medium text-charcoal hover:text-oak-brown">Login</a>
                    <!-- <a href="/register" class="block px-3 py-2 text-base font-medium text-charcoal hover:text-oak-brown">Register</a> -->
                    @endauth
                </nav>
            </div>
        </div>
    </div>
</nav>
