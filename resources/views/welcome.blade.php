<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inicio') }}
        </h2> --}}
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </div>
                <div class="text-center font-bold px-3 mb-10 text-indigo-500">
                    <p>DiabetesApp es una aplicación creada por y para Una Diabética en la Cocina &copy;</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
