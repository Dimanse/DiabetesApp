<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-6"!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#4b5563" class="dark:fill-gray-200" d="M0 64C0 28.7 28.7 0 64 0H384c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zM256 448a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM384 64H64V384H384V64z"/></svg>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Controles glucémicos') }}
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

    <div class="py-4 md:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" >
                <div class="flex flex-col md:flex-row md:justify-around items-center md:mt-7">
                    <div class="p-6 text-gray-900 font-bold dark:text-gray-100 flex gap-2">
                        {{ __("Actualiza tu glucemia") }}
                        <p class="text-indigo-500"> {{$usuario->name}}</p>
                    </div>
                    <div>
                        <x-button
                            class="flex items-center gap-2"
                            :href="route('controles.show')"
                        >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" class="dark:fill-gray-700" d="M125.7 160H176c17.7 0 32 14.3 32 32s-14.3 32-32 32H48c-17.7 0-32-14.3-32-32V64c0-17.7 14.3-32 32-32s32 14.3 32 32v51.2L97.6 97.6c87.5-87.5 229.3-87.5 316.8 0s87.5 229.3 0 316.8s-229.3 87.5-316.8 0c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0c62.5 62.5 163.8 62.5 226.3 0s62.5-163.8 0-226.3s-163.8-62.5-226.3 0L125.7 160z"/></svg>

                        </x-button>
                    </div>
                </div>
                <div class="md:flex md:justify-around md:items-start p-4">
                    <div class=" md:py-2  border border-gray-400  rounded my-4 md:w-6/12 md:max-h-60 md:shadow-lg bg-cyan-100 ">
                        <div class=" md:w-11/12 mx-auto p-4 border border-gray-400 bg-gray-50 rounded space-y-2 md:my-3   md:shadow-lg">
                            <div class="flex justify-between ">
                                <p>Fecha de glucemia: </p>
                                <span class="font-bold text-cyan-500">{{Carbon\Carbon::parse($control->fecha)->format('d / m / Y') }}</span>
                            </div>
                            <div class="flex justify-between ">
                                <p>Hora de glucemia: </p>
                                <span class="font-bold ">{{$control->hora}}</span>
                            </div>
                            <div class="text-end">

                                <span class="font-semibold text-blue-600 ">{{$control->comentario_hora}}</span>
                                <span class="font-semibold text-blue-600 ">{{$control->horario->horario}}</span>
                            </div>
                            <div class="flex justify-between ">
                                <p>Glucemia capilar: </p>
                                <span class="font-bold  text-white py-1 px-4 rounded @if ($control->glucemia > 140 || $control->glucemia < 90) bg-red-600

                                @else
                                bg-green-600
                                @endif ">{{$control->glucemia}} mg/dl</span>
                            </div>
                            <div class="flex @if (!$control->observaciones)
                                    justify-center
                            @else
                                justify-between
                            @endif ">
                                <p class="@if (!$control->observaciones)
                                    font-bold
                                @else
                                    font-normal
                                @endif">@if (!$control->observaciones)
                                    No hay observaciones
                                @else
                                    Observaciones:
                                @endif </p>
                                <span class="font-semibold "> @if ($control->observaciones)
                                    {{$control->observaciones}}
                                @endif </span>
                            </div>



                        </div>
                    </div>
                    <div class="md:w-5/12">

                        <livewire:editar-glucemia
                            :control="$control"
                        />
                    </div>
                </div>

            </div>
            </div>
        </div>
</x-app-layout>
