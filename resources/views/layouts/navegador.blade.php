<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 print:border-0 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center p-3">

                    <x-enlace-logo :href="route('welcome')">

                        <x-dashboard-logo  class=" fill-current text-gray-800 dark:text-gray-200" />
                    </x-enlace-logo>

                </div>

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden print:hidden sm:flex sm:items-center sm:ms-6">


                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ __('Iniciar Sesión') }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('login')">
                            {{ __('Inicia Sesión') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('register')">
                            {{ __('Crea tu cuenta') }}
                        </x-dropdown-link>

                        <!-- Authentication -->

                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    @auth
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('controles.show')" :active="request()->routeIs(['controles.show', 'controles.create', 'controles.editar'])">
                    {{ __('Controles') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('tratamiento.show')" :active="request()->routeIs('tratamiento.show', 'tratmaiento.create', 'tratamiento.editar')">
                    {{ __('Tratamiento') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('citas.show')" :active="request()->routeIs('citas.show', 'citas.create', 'citas.editar')">
                    {{ __('Proximas citas') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('informacion.show')" :active="request()->routeIs('informacion.show', 'informacion.create', 'informacion.editar')">
                    {{ __('Información médica') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Perfil') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link
                            class="hover:text-red-600"
                            :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Cerrar Sesión') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    @endauth
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            {{-- <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('controles.show')" :active="request()->routeIs(['controles.show', 'controles.create', 'controles.editar'])">
                    {{ __('Controles') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('tratamiento.show')" :active="request()->routeIs('tratamiento.show', 'tratmaiento.create', 'tratamiento.editar')">
                    {{ __('Tratamiento') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('citas.show')" :active="request()->routeIs('citas.show', 'citas.create', 'citas.editar')">
                    {{ __('Proximas citas') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('informacion.show')" :active="request()->routeIs('informacion.show', 'informacion.create', 'informacion.editar')">
                    {{ __('Información médica') }}
                </x-responsive-nav-link>
            </div> --}}

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                {{-- <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{__('Iniciar Sesión') }}</div>
                    {{-- <div class="font-medium text-sm text-gray-500">{{ __('Iniciar Sesión')}}</div> --}}
                {{-- </div> --}}

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('login')">
                        {{ __('Iniciar Sesión') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('register')">
                        {{ __('Crear una cuenta') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->

                </div>
            </div>
        </div>
</nav>