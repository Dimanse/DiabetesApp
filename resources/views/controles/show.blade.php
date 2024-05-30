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
                        {{ __("Niveles de glucosa de") }}
                        <p class="text-indigo-500"> {{$usuario->name}}</p>
                    </div>
                    <div>
                        <x-button
                            :href="route('controles.create')"
                        >
                            Registrar glucémias
                        </x-button>
                    </div>
                </div>
                <div >
                    <livewire:mostrar-controles />
                </div>

            </div>
            </div>
        </div>
</x-app-layout>
