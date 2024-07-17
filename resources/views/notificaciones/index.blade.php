<x-app-layout>
    <x-slot name="header" >
        <div class="flex items-center gap-3">

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#4b5563" class="dark:fill-gray-200" d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
            <h2 class="font-semibold text-xl text-gray-600 dark:text-gray-200 leading-tight">
                {{ __('Notificaciones') }}
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
                            {{ __("Notificaciones para") }}
                            <p class="text-indigo-500"> {{$user->name}}</p>
                        </div>





                        <div>
                            {{-- <x-button
                                :href="route('citas.create')"
                                >
                                Registra una nueva cita médica
                            </x-button> --}}
                        </div>


                    </div>


                <div class="md:w-9/12 mx-auto">
                    {{-- <livewire:mostrar-cita
                        /> --}}
                        @forelse ($notificaciones as $notificacion)
                        <div class="p-5 border border-gray-200 md:flex md:justify-between md:items-center">

                                {{-- {{dd(Carbon\Carbon::parse($notificacion->data['glucemia_fecha'])->format('d-m-Y'))}} --}}
                                {{-- {{dd($notificacion->data['user_id']->user)}} --}}
                                <div>

                                    @if ($notificacion->type === 'App\Notifications\NuevoComentarioGlucemia')
                                    <p>Tienes un nuevo comentario en la glucemia del día: <span class="font-bold text-blue-500">{{$notificacion->data['glucemia_fecha']}}</span> </p>
                                    @else

                                    @endif
                                    @if ($notificacion->type === 'App\Notifications\NuevoComentario')
                                    <p>Tienes un nuevo comentario en la consulta de: <span class="font-bold text-blue-500">{{$notificacion->data['cita_consulta']}}</span> </p>
                                    @else

                                    @endif
                                    @if ($notificacion->type === 'App\Notifications\NuevoComentarioTratamiento')
                                    <p>Tienes un nuevo comentario en el tratamiento : <span class="font-bold text-blue-500">{{$notificacion->data['tratamiento_nombre']}}</span> </p>
                                    @else

                                    @endif

                                    <p class="text-sm text-gray-500"> <span class="capitalize font-bold">{{$notificacion->created_at->diffForHumans()}}</span></p>
                                </div>
                                <div class="mt-5 md:mt-0">
                                    @if ($notificacion->type === 'App\Notifications\NuevoComentario')
                                        <a href="{{route('comentarioscitas.show', ['user' => $user, 'cita' => $notificacion->data['cita_id']])}}" class="bg-indigo-600 text-white px-3 py-1 text-xs rounded-lg font-bold uppercase hover:bg-blue-300 text-center ">Ver Comentario</a>
                                    @else

                                    @endif

                                    @if ($notificacion->type === 'App\Notifications\NuevoComentarioTratamiento')
                                        <a href="{{route('comentariotratamiento.show', ['user' => $user, 'tratamiento' => $notificacion->data['tratamiento_id']])}}" class="bg-indigo-600 text-white px-3 py-1 text-xs rounded-lg font-bold uppercase hover:bg-blue-300 text-center ">Ver Comentario</a>
                                    @else

                                    @endif
                                </div>

                        </div>
                        @empty
                        <p class="text-center font-semibold text-gray-600 mb-5">No hay notificaciones nuevas</p>
                    @endforelse
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
