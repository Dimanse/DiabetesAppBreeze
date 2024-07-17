<x-app-layout>
    <x-slot name="header" >
        <div class="flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path class="dark:fill-gray-200" fill="#4b5563" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg>
            
            <h2 class="font-semibold text-xl text-gray-600 dark:text-gray-200 leading-tight">

                {{ __('Likes') }}
            </h2>
        </div>
        <div class="flex justify-end -mt-5 md:mt-0">
            <div>
                <x-button
                    class="flex items-center gap-2"
                    :href="route('historia.show', auth()->user())"
                >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" class="dark:fill-gray-700" d="M125.7 160H176c17.7 0 32 14.3 32 32s-14.3 32-32 32H48c-17.7 0-32-14.3-32-32V64c0-17.7 14.3-32 32-32s32 14.3 32 32v51.2L97.6 97.6c87.5-87.5 229.3-87.5 316.8 0s87.5 229.3 0 316.8s-229.3 87.5-316.8 0c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0c62.5 62.5 163.8 62.5 226.3 0s62.5-163.8 0-226.3s-163.8-62.5-226.3 0L125.7 160z"/></svg>

                </x-button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container w-11/12 md:w-6/12 mx-auto py-10">

                    <table class=" w-full shadow-lg border border-gray-200">
    
                        <tbody>
                            @foreach ($likes as $like )
                            {{-- {{dd($like->user)}} --}}
                            <tr class="even:bg-slate-100" >
                                <td class=" py-3 flex justify-center " >
                                    <img src="{{ asset('/storage/imagenes') . '/' . $like->user->historia->imagen }} " alt="imagen del usuario" class="rounded-full w-16 md:w-20">
                                </td>
    
                                <td class=" py-3  text-center " >
                                        <p class="text-sky-600 font-bold md:text-lg">{{$like->user->name}}</p>
                                        <span class="text-xs block">{{$like->created_at->diffForHumans()}}</span>
                                </td>
    
    
                            </tr>
        
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>