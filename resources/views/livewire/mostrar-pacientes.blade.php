<div class="w-11/12 mx-auto print:mt-0">
                    {{-- {{dd($follower->id)}} --}}
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-5">



                        @foreach ( $users as $user )

                        <div class="p-6 text-gray-900 border-b border-gray-200 md:flex md:justify-between md:items-center shadow">
                            <div class="leading-10 flex justify-center md:justufy-start items-center gap-3">
                                {{-- <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-xl font-bold"> --}}

                                  {{-- {{dd($user->perfil)}} --}}

                                    <img src="{{ asset('../storage/imagenes/' . $user->historia->imagen) }}" alt="{{ 'imagen de' . ' ' . $user->historia->nombre }}" class="rounded w-20 mb-5 md:mb-0 ">
                                    @if ($user->id !== auth()->user()->id)
                                        @if (!$user->siguiendo( auth()->user() ))
                                            <p href="#" class="text-xl font-bold">{{ $user->name }}</p>
                                        @else
                                        <a href="{{ route('historia.show', $user->name) }}" class="text-xl font-bold hover:text-indigo-600">{{ $user->name}}</a>
                                        @endif
                                        {{-- <p href="#" class="text-xl font-bold">{{ $user->name }}</p> --}}
                                    @else
                                    <a href="{{ route('historia.show', $user->name) }}" class="text-xl font-bold hover:text-indigo-600">{{ $user->name }}</a>
                                    @endif
                                    {{-- <p href="#" class="text-xl font-bold">{{ $user->name }}</p> --}}
                                </div>

                                <div class="flex flex-col md:flex-row items-center gap-3 mt-5 md:mt-0">
                                    <a href="{{ route('user.followers', $user) }}"  class="font-bold text-sm mb-3 md:mb-0 text-gray-800">
                                        {{ $user->followers->count() }}
                                        <span class="font-normal">
                                            @choice('Follower|Followers', $user->followers->count() )
                                        </span>
                                    </a>
                                        <a href="{{ route('user.followings', $user) }}" class="font-bold text-sm mb-3 md:mb-0 text-gray-800">
                                            {{ $user->followings->count() }}
                                            <span class="font-normal"> siguiendo</span>
                                        </a>





                                    @auth

                                        @if($user->id !== auth()->user()->id )
                                            @if( !$user->siguiendo( auth()->user() ) )
                                                <form
                                                    action="{{ route('users.follow', $user) }}"
                                                    method="POST"
                                                    >
                                                    @csrf
                                                    <input
                                                        type="submit"
                                                        class="bg-blue-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer"
                                                        value="Seguir"
                                                        />
                                                </form>

                                            @else

                                                <form
                                                    action="{{route('users.unfollow', $user)}}"

                                                    method="Post"

                                                    >
                                                    @csrf
                                                    @method('DELETE')
                                                    <input
                                                    type="submit"
                                                    class="bg-red-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer"
                                                    value="Dejar de seguir"
                                                    />
                                                </form>
                                       {{-- {{dd($user->glucemia)}} --}}
                                        @if ($user->glucemias->count() === 0 )

                                        @else
                                            <a
                                            href="{{ route('glucemias.show', $user->name) }}"
                                            class=" bg-slate-800 text-white px-3 py-1 text-xs rounded-lg font-bold uppercase hover:bg-slate-300 text-center hover:text-slate-800">
                                            {{-- {{dd($glucemia)}} --}}
                                            Ver glucemias</a>
                                        @endif

                                        @if ($user->glucemias->count() === 0 )

                                        @else
                                            <a
                                            href="{{ route('grafica.show', $user->name) }}"
                                            class=" bg-sky-600 text-white px-3 py-1 text-xs rounded-lg font-bold uppercase hover:bg-sky-300 text-center hover:text-slate-800">
                                            {{-- {{dd($glucemia)}} --}}
                                            Ver grafica</a>
                                        @endif

                                        @if ($user->tratamiento->count() === 0)

                                        @else
                                            <a
                                            href="{{ route('tratamientos.show', $user->name) }}"
                                            class=" bg-indigo-600 text-white px-3 py-1 text-xs rounded-lg font-bold uppercase hover:bg-indigo-300 text-center hover:text-slate-800">Ver Tratamientos</a>
                                        @endif

                                        @if ($user->cita->count() === 0)

                                        @else
                                            <a
                                            href="{{ route('citas.show', $user->name) }}"
                                            class="text-xs bg-cyan-600 text-white px-3 py-1 rounded-lg font-bold uppercase hover:bg-cyan-300 text-center hover:text-blue-800">Ver Citas</a>
                                        @endif







                                            @endif
                                        @else
                                        @if ($user->glucemias->count() === 0 )

                                        @else
                                            <a
                                            href="{{ route('glucemias.show', $user->name) }}"
                                            class=" bg-slate-800 text-white px-3 py-1 text-xs rounded-lg font-bold uppercase hover:bg-slate-300 text-center hover:text-slate-800">
                                            {{-- {{dd($glucemia)}} --}}
                                            Ver glucemias</a>
                                        @endif


                                        @if ($user->glucemias->count() === 0 )

                                        @else
                                            <a
                                            href="{{ route('grafica.show', $user->name) }}"
                                            class=" bg-sky-600 text-white px-3 py-1 text-xs rounded-lg font-bold uppercase hover:bg-sky-300 text-center hover:text-slate-800">
                                            {{-- {{dd($glucemia)}} --}}
                                            Ver grafica</a>
                                        @endif

                                        @if ($user->tratamiento->count() === 0)

                                        @else
                                            <a
                                            href="{{ route('tratamientos.show', $user->name) }}"
                                            class="text-xs bg-blue-800 text-white px-3 py-1 rounded-lg font-bold uppercase hover:bg-blue-300 text-center hover:text-blue-800">Ver Tratamientos</a>
                                        @endif

                                        @if ($user->cita->count() === 0)

                                        @else
                                            <a
                                            href="{{ route('citas.show', $user->name) }}"
                                            class="text-xs bg-cyan-600 text-white px-3 py-1 rounded-lg font-bold uppercase hover:bg-cyan-300 text-center hover:text-blue-800">Ver Citas</a>
                                        @endif
                                        @endif
                                    @endauth

                                </div>

                            </div>

                        @endforeach

                    </div>
                    <div class="my-10">
                        {{$users->links()}}
                    </div>
                </div>
