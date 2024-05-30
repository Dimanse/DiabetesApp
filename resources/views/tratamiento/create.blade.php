<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-8"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#4b5563" class="dark:fill-gray-200" d="M64 144c0-26.5 21.5-48 48-48s48 21.5 48 48V256H64V144zM0 144V368c0 61.9 50.1 112 112 112s112-50.1 112-112V189.6c1.8 19.1 8.2 38 19.8 54.8L372.3 431.7c35.5 51.7 105.3 64.3 156 28.1s63-107.5 27.5-159.2L427.3 113.3C391.8 61.5 321.9 49 271.3 85.2c-28 20-44.3 50.8-47.3 83V144c0-61.9-50.1-112-112-112S0 82.1 0 144zm296.6 64.2c-16-23.3-10-55.3 11.9-71c21.2-15.1 50.5-10.3 66 12.2l67 97.6L361.6 303l-65-94.8zM491 407.7c-.8 .6-1.6 1.1-2.4 1.6l4-2.8c-.5 .4-1 .8-1.6 1.2z"/></svg>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Tratamiento médico') }}
            </h2>
        </div>
    </x-slot>

    <div class=" py-4 md:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg " >
                <div class="flex flex-col md:flex-row md:justify-around items-center">
                    <div class="p-6 text-gray-900 font-bold dark:text-gray-100 flex gap-2">
                        {{ __("Registra tu tratamiento") }}
                        <p class="text-indigo-500"> {{$usuario->name}}</p>
                    </div>
                    <div>
                        <x-button
                            class="flex items-center gap-2"
                            :href="route('tratamiento.show')"
                        >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" class="dark:fill-gray-700" d="M125.7 160H176c17.7 0 32 14.3 32 32s-14.3 32-32 32H48c-17.7 0-32-14.3-32-32V64c0-17.7 14.3-32 32-32s32 14.3 32 32v51.2L97.6 97.6c87.5-87.5 229.3-87.5 316.8 0s87.5 229.3 0 316.8s-229.3 87.5-316.8 0c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0c62.5 62.5 163.8 62.5 226.3 0s62.5-163.8 0-226.3s-163.8-62.5-226.3 0L125.7 160z"/></svg>

                        </x-button>
                    </div>
                </div>
                <div class="md:w-5/12 mx-auto">
                        <livewire:crear-tratamiento />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
