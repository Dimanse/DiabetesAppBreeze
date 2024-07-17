<div class=" bg-white  shadow-lg border border-gray-200 my-5">
    {{-- <h2 class="text-center text-2xl uppercase font-bold my-5 text-gray-700">Citas Médicas</h2> --}}
    <div class=" px-5 mb-10">
        <div class="mb-10 p-5 grid md:grid-cols-2 gap-5">

            @foreach ($citas as $cita )
            <div class="flex">
                <div  @if( Carbon\Carbon::now() > $cita->fecha))
                    class="w-4/12 border-2 border-red-500  p-3 bg-red-100 flex flex-col justify-center items-center"
                @else
                    class="w-4/12 border-2 border-green-500  p-3 bg-white flex flex-col justify-center items-center"
                @endif >
                {{-- {{dd(Carbon\Carbon::now()->format('d-m-Y'))}} --}}
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

                    <div class="mt-5 flex justify-between items-center gap-2 print:hidden">

                        <div>
                            <a
                            href="{{ route('comentarioscitas.show', ['cita'  => $cita, 'user' => $user] ) }}"
                             class="bg-indigo-500 hover:bg-indigo-700 text-white px-3 md:px-5 py-2 rounded uppercase font-semibold cursor-pointer flex justify-between items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-4"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg></a>


                        </div>
                        <p class="font-bold">{{$cita->comentarios->count()}} <span class="font-normal"> @choice('comentario|comentarios', $cita->comentarios->count() )</span></p>
                    </div>



                </div>

            </div>
            @endforeach

        </div>
    </div>
    <div class="my-10 px-10">
        {{$citas->links()}}
    </div>
</div>
