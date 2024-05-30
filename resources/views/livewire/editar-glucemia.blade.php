<div>

    <form class="my-4 px-4 " novalidate wire:submit.prevent='editarGlucemia'>
        @csrf

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="fecha" :value="__('Fecha')" />
                <x-text-input id="fecha" class="block mt-1 w-full" type="date" wire:model="fecha" :value="old('fecha')" required autofocus  />
                <x-input-error :messages="$errors->get('fecha')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="hora" :value="__('Hora')" />

                <x-text-input id="hora" class="block mt-1 w-full"
                                type="time"
                                wire:model="hora"
                                :value="old('hora')" required autofocus />

                <x-input-error :messages="$errors->get('hora')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="horario" :value="__('Momento de la glucemia')" />

                <select
                wire:model="horario_id"
                id="horario"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 dark:bg-gray-900 dark:text-gray-300 focus:ring-indigo-500 rounded-md shadow-sm'" >
                <option selected hidden> --Seleccionar horario-- </option>
                @foreach ( $horarios as $horario )
                <option value="{{ $horario->id }}"> {{ $horario->horario }} </option>
                @endforeach


            </select>

                <x-input-error :messages="$errors->get('horario_id')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="comentario_hora" :value="__('Horario diferente a los anteriores')" />
                <x-text-input id="comentario_hora" class="block mt-1 w-full" type="text" wire:model="comentario_hora" :value="old('comentario_hora')" placeholder="Ej.: 2,5 horas" required autofocus  />
                <x-input-error :messages="$errors->get('comentario_hora')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="glucemia" :value="__('Glucémia')" />
                <x-text-input id="glucemia" class="block mt-1 w-full" type="number" wire:model="glucemia" :value="old('glucemia')" placeholder="Ej.: 140" required autofocus  />
                <x-input-error :messages="$errors->get('glucemia')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="observaciones" :value="__('Observaciones')" />
                <x-text-input id="observaciones" class="block mt-1 w-full" type="text" wire:model="observaciones" :value="old('observaciones')" placeholder="Ej.: me sentia mareada" required autofocus  />
                <x-input-error :messages="$errors->get('observaciones')" class="mt-2" />
            </div>


            <x-primary-button class="mt-5">
                {{ __('Guardar Cambios') }}
            </x-primary-button>
    </form>
</div>

