<x-app-layout>
    <x-slot name="header" >
        <div class="flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#4b5563" class="dark:fill-gray-200" d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>
            <h2 class="font-semibold text-xl text-gray-600 dark:text-gray-200 leading-tight">
                {{ __('Citas médicas') }}
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

                    <div class="flex flex-col md:flex-row md:justify-around items-center md:mt-7">
                        <div class="p-6 text-gray-900 font-bold dark:text-gray-100 flex gap-2">
                            {{ __("Citas médicas de") }}
                            <p class="text-indigo-500"> {{$user->name}}</p>
                        </div>





                        <div>
                            <x-button
                                :href="route('citas.create')"
                                >
                                Registra una nueva cita médica
                            </x-button>
                        </div>


                    </div>


                <div class="px-5">
                    <livewire:mostrar-cita
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

