<div>
    <div class="  grid md:grid-cols-2 gap-x-5 mt-5  rounded-lg">
        @forelse ( $citas as $cita)

        <div>
            {{-- {{dd( Carbon::now()->toDateString())}} --}}
            <div class="flex justify-between  mb-5">

                <div  @if( Carbon\Carbon::now() > $cita->fecha))
                    class="w-4/12 border-2 border-red-500  p-3 bg-red-100 flex flex-col justify-center items-center"
                @else
                    class="w-4/12 border-2 border-green-500  p-3 bg-white flex flex-col justify-center items-center"
                @endif >
                <p class="font-bold  text-center text-5xl  @if ( Carbon\Carbon::now() > $cita->fecha)
                    text-red-600
                    @else
                    text-gray-800
                    @endif">{{Carbon\Carbon::parse($cita->fecha)->isoFormat('D')}}</p>
                    <p class="font-semibold text-center uppercase @if ( Carbon\Carbon::now() > $cita->fecha)
                        text-red-600
                        @else
                        text-gray-500
                        @endif">{{Carbon\Carbon::parse($cita->fecha)->isoFormat('MMM')}}</p>
                        <p class="
                        @if ( Carbon\Carbon::now() > $cita->fecha)
                        text-red-600 font-bold uppercase
                        @else

                        @endif">
                            @if ( Carbon\Carbon::now() > $cita->fecha)
                            Caducada
                            @else

                            @endif</p>
                </div>

                <div  @if ( Carbon\Carbon::now() > $cita->fecha)
                    class="w-8/12  p-3 bg-white border-2 border-red-600"
                @else
                    class="w-8/12  p-3 bg-white border-2 border-green-500"
                @endif>
                    <p class="font-bold uppercase">{{$cita->clinica}}</p>
                    <div class="md:flex  gap-4">
                        <p class="font-semibold">{{Carbon\Carbon::parse($cita->fecha)->isoFormat('dddd,')}} <span class="font-normal">{{Carbon\Carbon::parse($cita->fecha)->isoFormat('D-M-YYYY')}}</span> </p>

                        <p class="font-semibold">{{Carbon\Carbon::parse($cita->hora)->format('H:i')}}</p>
                    </div>
                    <div class="flex flex-row gap-5">

                        <p>medicina:  </p><span class="font-bold uppercase">{{$cita->consulta}}</span>
                    </div>
                    @if (!$cita->doctor)

                    @else
                        <p><span class="font-bold">{{$cita->doctor}}</span> </p>
                    @endif
                    @if (!$cita->sala)

                    @else
                    <p>sala: <span class="font-bold">{{$cita->sala}}</span> </p>
                    @endif


                    @if (!$cita->observaciones)

                    @else
                        <p><span class="font-semibold">{{$cita->observaciones}}</span> </p>
                    @endif

                    <p class="text-end text-sm">Cita creada: <span class="font-semibold">{{$cita->created_at->diffForHumans()}}</span> </p>
                    <div class="mt-5 flex  items-center gap-2 print:hidden @if ( Carbon\Carbon::now()->format('d / m / Y') > Carbon\Carbon::parse($cita->fecha)->format('d / m / Y'))
                        justify-end
                    @else
                        justify-between
                    @endif">
                        <a
                        href="{{ route('citas.edit', $cita->id ) }}" class="text-indigo-500 hover:text-indigo-700 uppercase font-semibold cursor-pointer @if ( Carbon\Carbon::now() > $cita->fecha)->format('d / m / Y'))
                        hidden
                    @else

                    @endif">
                            Editar</a>

                            <button
                                wire:click="$dispatch('mostrarAlerta', {id: {{ $cita->id}}})"
                                class="text-red-600 hover:text-red-700 uppercase font-semibold cursor-pointer ">



                                Eliminar</button>

                    </div>
                </div>
            </div>




                </div>


                @empty
                <div class="">
                    <h3 class="font-bold text-center text-gray-600 uppercase"> Aún no hay citas médicas que mostrar</h3>
                    </div>
                    @endforelse
                </div>
                <div class="my-10 px-5">
                    {{$citas->links()}}
                </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        document.addEventListener('livewire:initialized', () => {
            @this.on('mostrarAlerta', citaId => {
                Swal.fire({
                    title: '¿Eliminar Cita?',
                    text: "Una cita eliminada no se puede recuperar!!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // ELiminar vacante
                        @this.call('eliminarCita',citaId);
                        Swal.fire(
                            'Se eliminó tu cita médica',
                            'Eliminada correctamente',
                            'success'
                        )
                    }
                })

            });
        });

    </script>
@endpush
