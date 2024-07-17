
<x-app-layout>
    <x-slot name="header" >
        <div class="flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#4b5563" class="dark:fill-gray-200" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-96 55.2C54 332.9 0 401.3 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7c0-81-54-149.4-128-171.1V362c27.6 7.1 48 32.2 48 62v40c0 8.8-7.2 16-16 16H336c-8.8 0-16-7.2-16-16s7.2-16 16-16V424c0-17.7-14.3-32-32-32s-32 14.3-32 32v24c8.8 0 16 7.2 16 16s-7.2 16-16 16H256c-8.8 0-16-7.2-16-16V424c0-29.8 20.4-54.9 48-62V304.9c-6-.6-12.1-.9-18.3-.9H178.3c-6.2 0-12.3 .3-18.3 .9v65.4c23.1 6.9 40 28.3 40 53.7c0 30.9-25.1 56-56 56s-56-25.1-56-56c0-25.4 16.9-46.8 40-53.7V311.2zM144 448a24 24 0 1 0 0-48 24 24 0 1 0 0 48z"/></svg>
            <h2 class="font-semibold text-xl text-gray-600 dark:text-gray-200 leading-tight">
                {{ __('Followers') }}
            </h2>
        </div>
        <div class="flex justify-end -mt-5 md:mt-0">

            {{-- @if (session()->has('mensaje'))
                <div class="py-2 px-6 uppercase border border-green-600 text-green-700 bg-green-100 font-bold text-xs text-center my-3">
                    {{ session('mensaje') }}
                </div>
            @endif --}}
            <div>
                <x-button
                    class="flex items-center gap-2"
                    :href="route('usuarios.index')"
                >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" class="dark:fill-gray-700" d="M125.7 160H176c17.7 0 32 14.3 32 32s-14.3 32-32 32H48c-17.7 0-32-14.3-32-32V64c0-17.7 14.3-32 32-32s32 14.3 32 32v51.2L97.6 97.6c87.5-87.5 229.3-87.5 316.8 0s87.5 229.3 0 316.8s-229.3 87.5-316.8 0c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0c62.5 62.5 163.8 62.5 226.3 0s62.5-163.8 0-226.3s-163.8-62.5-226.3 0L125.7 160z"/></svg>

                </x-button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                    
                    @if($followers)
                        <div class="container w-11/12 md:w-6/12 mx-auto py-10">
                            <table class="w-full shadow-lg border border-gray-200">

                                <tbody>

                                        @foreach ($followers as $follower )
                                            <tr class="even:bg-slate-100" >
                                                <td class=" py-3 flex justify-center " >
                                                    <img src="{{ asset('storage/imagenes') . '/' . $follower->historia->imagen }} " alt="imagen del usuario" class="rounded-full w-16 md:w-20">
                                                </td>

                                                <td class=" py-3  text-center " >
                                                        <p class="text-sky-600 font-bold md:text-lg">{{$follower->historia->nombre}}</p>
                                                        <span class="text-xs block">{{$follower->created_at->diffForHumans()}}</span>
                                                </td>


                                            </tr>

                                        @endforeach

                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center font-bold text-gray-600">Aún no tienes ningún follower, empieza a seguir a alguien</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
