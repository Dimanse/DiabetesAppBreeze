<x-app-layout >
    <x-slot name="header">
        <div class="flex items-center gap-3 print:hidden">
            {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-6"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#4b5563" class="dark:fill-gray-200" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg> --}}

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-6"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#4b5563" class="dark:fill-gray-200" d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/></svg>

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Pacientes') }}
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

    <div class="py-4 md:py-12 print:py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 print:px-0">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" >
                <div class=" flex flex-col md:flex-row justify-around items-center md:mt-7">
                    <div class="p-6  font-bold flex gap-2 text-2xl uppercase text-gray-600 dark:text-gray-200 leading-tight">
                        <livewire:filtrar-pacientes />


                    </div>

                </div>


                <livewire:mostrar-pacientes />
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
