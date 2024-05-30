<form class="my-4 p-4 " novalidate wire:submit.prevent='crearTratamiento'>
    @csrf


        <div class="mt-4">
            <x-input-label for="hora"
                :value="__('Hora a la que se toma el medicamento')"
                />

            <x-text-input id="hora"
                class="block mt-1 w-full"
                type="time"
                wire:model="hora"
                :value="old('hora')"
                required
                autofocus
                />

            <x-input-error :messages="$errors->get('hora')"
                class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="nombre"
                :value="__('Nombre del medicamento')"
                />

            <x-text-input id="nombre"
                class="block mt-1 w-full"
                type="text"
                wire:model="nombre"
                :value="old('nombre')"
                placeholder="Ej.: Gelocatil, Acetaminofen..."
                required
                autofocus
                />

            <x-input-error :messages="$errors->get('nombre')"
                class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="gramos"
                :value="__('Gramos del medicamento')"
                />

            <x-text-input id="gramos"
                class="block mt-1 w-full"
                type="text"
                wire:model="gramos"
                :value="old('gramos')"
                placeholder="Ej.: 500 mg, 1 gr. "
                required
                autofocus
                />

            <x-input-error :messages="$errors->get('gramos')"
                class="mt-2" />
        </div>



        <div class="mt-4">
            <x-input-label for="imagen"
                :value="__('Imagen del medicamento')"
                />

            <x-text-input id="imagen"
                class="block mt-1 w-full"
                type="file"
                wire:model="imagen"
                :value="old('imagen')"
                required
                autofocus
                accept="image/*"
                />

            <div class="my-5">
                @if ($imagen)
                <p class="block text-sm text-gray-700 uppercase font-bold dark:text-gray-300">Imagen</p>
                <img src="{{$imagen->temporaryUrl()}}" class="w-40">
                @endif
            </div>

            <x-input-error :messages="$errors->get('imagen')"
                class="mt-2"
                />
        </div>

        <div class="mt-4">
            <x-input-label for="cantidad"
                :value="__('cantidad recetada')" />

            <x-text-input id="cantidad" class="block mt-1 w-full"
                type="text"
                wire:model="cantidad"
                :value="old('cantidad')"
                placeholder="Ej.: 2 cápsulas, 1 pastilla"
                required
                autofocus
                />

            <x-input-error :messages="$errors->get('cantidad')"
                class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="recetado"
                :value="__('Para que es recetado')" />

            <x-text-input id="recetado"
                class="block mt-1 w-full"
                type="text"
                wire:model="recetado"
                :value="old('recetado')"
                placeholder="Ej.: para reducir triglicéridos "
                required
                autofocus
                />

            <x-input-error :messages="$errors->get('recetado')"
                class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="cuando"
                :value="__('Cuando se toma')" />

            <x-text-input id="cuando"
                class="block mt-1 w-full"
                type="text"
                wire:model="cuando"
                :value="old('cuando')"
                placeholder="Ej.: 30 minutos antes del almuerzo"
                required
                autofocus
                />

            <x-input-error :messages="$errors->get('cuando')"
                class="mt-2" />
        </div>


        <div class="mt-4">
            <x-input-label for="observaciones"
                :value="__('Observaciones')"
                />
            <x-text-input id="observaciones"
                class="block mt-1 w-full"
                type="text"
                wire:model="observaciones"
                :value="old('observaciones')"
                placeholder="Ej.: si siento nauseas dejar el tratamiento"
                required
                autofocus
                />
            <x-input-error :messages="$errors->get('observaciones')"
                class="mt-2" />
        </div>

        <x-primary-button class="mt-5">
            {{ __('Registrar Tratamiento médico') }}
        </x-primary-button>
</form>
