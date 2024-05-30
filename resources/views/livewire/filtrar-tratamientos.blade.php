<div class=" py-10 px-5">
    <h2 class="text-2xl md:text-3xl text-gray-600 text-center font-bold mb-5 md:mb-10">Buscar y Filtrar Tratamientos</h2>

    <div class="max-w-7xl mx-auto">
        <form
            wire:submit.prevent="leerDatosFormulario"
            >
            <div class="md:grid md:grid-cols-3 gap-5">
                <div class="mb-5">
                    <label 
                        class="block mb-1 text-sm text-gray-700 uppercase font-bold "
                        for="termino">Nombre del tratamiento
                    </label>
                    <input 
                        id="nombre"
                        type="text"
                        placeholder="Ej. Paracetamol"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                        wire:model="nombre"
                    />
                </div>

                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Hora de ingesta</label>
                    <input 
                        id="hora"
                        type="time"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                        wire:model="hora"
                    />
                </div>

                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Para que es recetado</label>
                    <input 
                        id="recetado"
                        type="text"
                        placeholder="Ej. dolores"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                        wire:model="recetado"
                    />
                </div>
            </div>

            <div class="flex justify-end">
                {{-- <input 
                    type="submit"
                    class="bg-indigo-500 hover:bg-indigo-600 transition-colors text-white text-sm font-bold px-10 py-2 rounded cursor-pointer uppercase w-full md:w-auto"
                    value="Filtrar búsqueda"
                /> --}}

                <x-primary-button class="md:w-auto px-10 py-2">
                    {{ __('Filtrar búsqueda') }}
                </x-primary-button>

            </div>
        </form>
    </div>
</div>
