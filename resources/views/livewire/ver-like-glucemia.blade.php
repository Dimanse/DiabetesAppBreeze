
<div class=" mb-10">
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


            {{-- <div class="flex items-center  gap-4"> --}}
                {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
                {{-- <button
                    wire:click="like"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="{{$isliked ? 'red' : 'white'}}"
                        viewBox="0 0 24 24"
                        stroke-width="{{$isliked ? .5 : 1}}"
                        stroke="currentColor" --}}
                        {{-- class="w-8 h-8"> --}}
                            {{-- <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" /> --}}
                    {{-- </svg> --}}

                {{-- </button> --}}
                {{-- {{dd($user)}} --}}
                {{-- <p class="font-bold">{{ $likes }} --}}
                {{-- <a --}}
                {{-- href="{{ route('likeglucemia.index', ['glucemia' => $glucemia, 'user' => $user]) }}" --}}
                 {{-- class="font-bold"> --}}
                 {{-- {{ $likes }} --}}
                    {{-- <span class="font-normal"> @choice('Like|Likes', $glucemia->likes->count() )</span> --}}
                {{-- </a> --}}
            {{-- </div> --}}

        </div>

    </div>
</div>
