<div class=" bg-white shadow-lg rounded-lg border border-gray-200 mb-10 mt-5">
    {{-- <h2 class="text-center text-2xl uppercase font-bold my-10 text-gray-700">Tratamientos</h2> --}}
    <div class="px-5 grid md:grid-cols-2 md:gap-x-5">

        @foreach ( $tratamientos as $tratamiento)
            <div class="mt-7 ">
                <div class="w-full border  border-gray-500  p-3 bg-white">
                    <p class="text-2xl font-semibold text-center">{{$tratamiento->nombre}} {{$tratamiento->gramos}}</p>
                </div>
                <div class="flex justify-between ">
                    <div class="w-4/12 border border-gray-500  p-3 bg-white flex flex-col justify-center items-center">
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="w-4" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#4b5563" d="M149.1 64.8L138.7 96H64C28.7 96 0 124.7 0 160V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V160c0-35.3-28.7-64-64-64H373.3L362.9 64.8C356.4 45.2 338.1 32 317.4 32H194.6c-20.7 0-39 13.2-45.5 32.8zM256 192a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"/></svg> --}}
                        <img src="{{ asset('../storage/medicamentos/' . $tratamiento->imagen) }}" alt="{{ 'imagen de' . ' ' . $tratamiento->nombre }}" class="w-40 h-36 mb-5 md:mb-0">
                        {{-- <p class="font-bold text-gray-800 text-center text-5xl">{{Carbon\Carbon::parse($cita->fecha)->isoFormat('D')}}</p> --}}
                        {{-- <p class="font-semibold text-gray-500 text-center uppercase ">{{Carbon\Carbon::parse($cita->fecha)->isoFormat('MMM')}}</p> --}}
                    </div>

                    <div class="w-8/12 border border-gray-500  p-3 md:p-5 bg-white">
                        {{-- <p class="font-bold uppercase">{{$cita->clinica}}</p> --}}
                        <div class="md:flex  gap-4">
                            {{-- <p class="font-semibold">{{Carbon\Carbon::parse($cita->fecha)->isoFormat('dddd,')}} <span class="font-normal">{{Carbon\Carbon::parse($cita->fecha)->isoFormat('D-M-YYYY')}}</span> </p> --}}

                            <p class="font-semibold">{{Carbon\Carbon::parse($tratamiento->hora)->format('H:i')}}</p>
                            @if (!$tratamiento->cuando)

                            @else
                                <p>{{$tratamiento->cuando}} </p>
                            @endif
                        </div>
                        <div class="lg:flex gap-5">
                            @if (!$tratamiento->cantidad)

                            @else
                            <p>cantidad: <span class="font-semibold text-gray-700">{{$tratamiento->cantidad}}</span> </p>
                            @endif
                        </div>
                        <div class="lg:flex gap-5">
                            @if (!$tratamiento->recetado)

                            @else
                                <p><span class="font-semibold text-sky-600">{{$tratamiento->recetado}}</span> </p>
                            @endif
                        </div>
                        <div class="lg:flex gap-5">
                            @if (!$tratamiento->observaciones)

                            @else
                                <p><span class="font-semibold">{{$tratamiento->observaciones}}</span> </p>
                            @endif
                        </div>
                        <div class="mt-5 flex justify-between items-center gap-2 print:hidden">

                            <div>
                                <a href="{{ route('comentariotratamiento.show', ['tratamiento'  => $tratamiento, 'user' => $user] ) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white px-3 md:px-5 py-2 rounded uppercase font-semibold cursor-pointer flex justify-between items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-4"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg></a>


                            </div>
                            <p class="font-bold">{{$tratamiento->comentarios->count()}} <span class="font-normal"> @choice('comentario|comentarios', $tratamiento->comentarios->count() )</span></p>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
        <div class="my-10 px-5">
            {{$tratamientos->links()}}
        </div>
</div>
