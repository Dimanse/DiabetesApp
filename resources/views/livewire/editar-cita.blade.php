<form class="mb-4 p-4 " novalidate wire:submit.prevent='editarCita'>
    @csrf

        <!-- Email Address -->
        <div class="mt-4 md:mt-0">
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
            <x-input-label for="clinica" :value="__('Clinica')" />

            <x-text-input id="clinica"
                            class="block mt-1 w-full"
                            type="text"
                            wire:model="clinica"
                            :value="old('clinica')"
                            placeholder="Ej.: clinica Marcial Fallas"
                            required
                            autofocus
                            />

            <x-input-error :messages="$errors->get('clinica')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="consulta" :value="__('tipo de consulta')" />
            <x-text-input id="consulta" class="block mt-1 w-full" type="text" wire:model="consulta" :value="old('consulta')" placeholder="Ej.: medicina general, especialista..." required autofocus  />
            <x-input-error :messages="$errors->get('consulta')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="doctor" :value="__('Nombre del doctor')" />
            <x-text-input id="doctor" class="block mt-1 w-full" type="text" wire:model="doctor" :value="old('doctor')" placeholder="Ej.: Dr. Gutiérrez" required autofocus  />
            <x-input-error :messages="$errors->get('doctor')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="sala" :value="__('Sala de la consulta')" />
            <x-text-input id="sala" class="block mt-1 w-full" type="text" wire:model="sala" :value="old('sala')" placeholder="Ej.: sala 17 - B" required autofocus  />
            <x-input-error :messages="$errors->get('sala')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="observaciones" :value="__('Observaciones')" />
            <x-text-input id="observaciones" class="block mt-1 w-full" type="text" wire:model="observaciones" :value="old('observaciones')" placeholder="Ej.: Ir en ayunas" required autofocus  />
            <x-input-error :messages="$errors->get('observaciones')" class="mt-2" />
        </div>


        <x-primary-button class="mt-5">
            {{ __('Guardar Cambios') }}
        </x-primary-button>
</form>
