<x-app-layout :user="auth()->user()">
    <x-slot name="header" >
        <div class="flex items-center gap-3">


            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#4b5563" class="dark:fill-gray-200" d="M441 7l32 32 32 32c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-15-15L417.9 128l55 55c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-72-72L295 73c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l55 55L422.1 56 407 41c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0zM210.3 155.7l61.1-61.1c.3 .3 .6 .7 1 1l16 16 56 56 56 56 16 16c.3 .3 .6 .6 1 1l-191 191c-10.5 10.5-24.7 16.4-39.6 16.4H97.9L41 505c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l57-57V325.3c0-14.9 5.9-29.1 16.4-39.6l43.3-43.3 57 57c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6l-57-57 41.4-41.4 57 57c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6l-57-57z"/></svg>
            <h2 class="font-semibold text-xl text-gray-600 dark:text-gray-200 leading-tight">
                {{ __('Glucemias capilares') }}
            </h2>
        </div>
        <div class="flex justify-end">

            @if (session()->has('mensaje'))
                <div class="py-2 px-6 uppercase border border-green-600 text-green-700 bg-green-100 font-bold text-xs text-center my-3">
                    {{ session('mensaje') }}
                </div>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if ($user->id === auth()->user()->id)
                    <div class="flex flex-col md:flex-row md:justify-around items-center md:mt-7">
                        <div class="p-6 text-gray-900 font-bold dark:text-gray-100 flex gap-2">
                            {{ __("Glucemias capilares de") }}
                            <p class="text-indigo-500"> {{$user->name}}</p>
                        </div>





                        <div>
                            <x-button
                                :href="route('glucemias.create')"
                                >
                                Registra tu glucemia
                            </x-button>
                        </div>


                    </div>

                @endif
                <div>
                    {{-- {{dd($user)}} --}}
                    <livewire:mostrar-glucemias
                        :user="$user"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@push('scripts')
    <script>

        if(document.querySelector( '.border-green-600', )) {
            setTimeout(() => {
                document.querySelector( 'border-green-600').remove();
            }, 8000);
        }
    </script>
@endpush
