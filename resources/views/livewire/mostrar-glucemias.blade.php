<div>
    <div class="  mb-14 px-5 grid md:grid-cols-2 lg:grid-cols-3 gap-5 mt-10">
        @forelse ( $glucemias as $glucemia)
            {{-- <div class=" "> --}}
                <div class="  p-3 border border-gray-400 bg-gray-50 rounded space-y-2  text-sm ">
                    <div class="flex justify-between ">
                        <p>Fecha de glucemia: </p>
                        <span class="font-bold text-cyan-500">{{Carbon\Carbon::parse($glucemia->fecha)->format('d / m / Y') }}</span>
                    </div>
                    <div class="flex justify-between ">
                        <p>Hora de glucemia: </p>
                        <span class="font-bold ">{{$glucemia->hora}}</span>
                    </div>
                    <div class="text-end">

                        <span class="font-semibold text-blue-600 ">{{$glucemia->comentario_hora}}</span>
                        <span class="font-semibold text-blue-600 ">{{$glucemia->horario->horario}}</span>
                    </div>
                    <div class="flex justify-between ">
                        <p>Glucemia capilar: </p>
                        <span class="font-bold  text-white py-1 px-4 rounded @if ($glucemia->glucemia > 140 || $glucemia->glucemia < 90) bg-red-600

                        @else
                        bg-green-600
                        @endif ">{{$glucemia->glucemia}} mg/dl</span>
                    </div>
                    <div class="flex @if (!$glucemia->observaciones)
                            justify-center
                    @else
                        justify-between
                    @endif ">
                        <p>@if (!$glucemia->observaciones)
                            No hay observaciones
                        @else
                            Observaciones:
                        @endif </p>
                        <span class="font-semibold "> @if ($glucemia->observaciones)
                            {{$glucemia->observaciones}}
                        @endif </span>
                    </div>

                    <div class="mt-5 flex justify-between items-center gap-2 print:hidden">
                        @if ($user->id !== auth()->user()->id)

                        @else

                            <a href="{{ route('glucemias.edit', $glucemia->id ) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white px-3 md:px-5 py-1 rounded uppercase font-semibold cursor-pointer flex justify-between items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                                Editar</a>




                                <button
                                    wire:click="$dispatch('mostrarAlerta', {id: {{ $glucemia->id}}})"
                                    class="bg-red-600 hover:bg-red-700 text-white px-5 py-1 rounded uppercase font-semibold cursor-pointer flex juistify-between items-center gap-2">

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#fcfcfc" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"/></svg>

                                    Eliminar</button>
                        @endif

                    </div>

                </div>


                @empty
                <div class="grid-cols-subgrid col-span-3">
                    <h3 class="font-bold text-center text-gray-600 uppercase"> Aún no hay glucemias que mostrar</>
                    </div>
                    @endforelse
                    {{-- </div> --}}
                </div>
                <div class="my-10 px-5">
                    {{$glucemias->links()}}
                </div>
            </div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="path/to/chartjs/dist/chart.umd.js"></script> --}}
    {{-- <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script> --}}



    <script>

        document.addEventListener('livewire:initialized', () => {
            @this.on('mostrarAlerta', glucemiaId => {
                Swal.fire({
                    title: '¿Eliminar Glucemia?',
                    text: "Una glucemia eliminada no se puede recuperar!!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // ELiminar vacante
                        @this.call('eliminarGlucemia',glucemiaId);
                        Swal.fire(
                            'Se eliminó tu glucemia capilar',
                            'Eliminada correctamente',
                            'success'
                        )
                    }
                })

            });
        });



    </script>
@endpush











