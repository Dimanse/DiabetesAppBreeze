<div>
    {{-- {{dd($glucemias)}} --}}
    <div class="  mb-10 p-5 grid md:grid-cols-2 lg:grid-cols-3 gap-5 mt-5">
        @forelse ( $glucemias as $glucemia)
            {{-- <div class=" "> --}}
                <div class="  p-3 border border-gray-400 bg-gray-50 rounded space-y-2   text-sm ">
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


                            <div>
                                <a href="{{ route('likeglucemia.show', ['glucemia'  => $glucemia, 'user' => $user] ) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white px-3 md:px-5 py-2 rounded uppercase font-semibold cursor-pointer flex justify-between items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-4"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg></a>


                            </div>
                            <p class="font-bold">{{$glucemia->comentarios->count()}} <span class="font-normal"> @choice('comentario|comentarios', $glucemia->comentarios->count() )</span></p>


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
