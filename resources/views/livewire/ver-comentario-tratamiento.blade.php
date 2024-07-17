<div>
    <p class="text-sm font-bold text-center text-gray-700 uppercase mb-4">Agrega un nuevo comentario</p>

                    <form class="my-4 p-4 " novalidate wire:submit.prevent='crearComentario'>
                        @csrf
                        <div class="mb-5">

                            <x-input-label for="comentario"
                                :value="__('Comentar esta glucemia')"
                                />
                                <x-text-area id="comentario"
                                class="block mt-1 w-full"
                                type="text"
                                wire:model="comentario"
                                :value="old('comentario')"
                                rows="4"
                                cols="50"
                                />

                            <x-input-error :messages="$errors->get('comentario')"
                                class="mt-2" />
                        </div>

                        <x-primary-button class="">
                            {{ __('Comentar') }}
                        </x-primary-button>
                    </form>


                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-5">
                    @if ($tratamiento->comentarios->count())
                        @foreach ( $tratamiento->comentarios as $comentario)
                            <div class="border-gray-300 border-b p-5">
                                <a href=" {{ route('historia.show', $comentario->user ) }} " class="font-bold">
                                    {{$comentario->user->name}}
                                </a>
                                <p class="text-gray-700">{{ $comentario->comentario}}</p>
                                <p class="text-gray-400 text-sm">{{ $comentario->created_at->diffForHumans()}}</p>
                                @if ($comentario->user_id === auth()->user()->id || $user->id === auth()->user()->id )
                                <div class="flex justify-end">

                                    <button
                                    wire:click="$dispatch('mostrarAlerta', {id: {{ $comentario->id}}})"
                                    class="bg-red-600 hover:bg-red-700 text-white px-5 py-1 rounded uppercase font-semibold cursor-pointer flex juistify-between items-center gap-2">

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#fcfcfc" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"/></svg>

                                    </button>
                                </div>
                                @else

                                @endif
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center">Se el primero en comentar</p>
                    @endif
                </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="path/to/chartjs/dist/chart.umd.js"></script> --}}
    {{-- <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script> --}}



    <script>

        document.addEventListener('livewire:initialized', () => {
            @this.on('mostrarAlerta', comentarioId => {
                Swal.fire({
                    title: '¿Eliminar comentario?',
                    text: "Un comentario eliminado no se puede recuperar!!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // ELiminar vacante
                        @this.call('eliminarComentario',comentarioId);
                        Swal.fire(
                            'Se eliminó tu comentario',
                            'Eliminada correctamente',
                            'success'
                        )
                    }
                })

            });
        });



    </script>
@endpush
