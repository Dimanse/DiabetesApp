<div>
    <div>

        <form class="my-4 p-4 " novalidate wire:submit.prevent='editHistorial'>
            @csrf


                <div class="mt-4">
                    <x-input-label for="nombre"
                        :value="__('Nombre del paciente')"
                        />

                    <x-text-input id="nombre"
                        class="block mt-1 w-full"
                        type="text"
                        wire:model="nombre"
                        :value="old('nombre')"
                        placeholder="Ej.: Juan María Sánchez Rodríguez"
                        required
                        autofocus
                        />

                    <x-input-error :messages="$errors->get('nombre')"
                        class="mt-2" />
                </div>



                <div class="mt-4">
                    <x-input-label for="imagen" :value="__('Imagen')" />

                    <x-text-input
                        id="imagen"
                        class="block mt-1 w-full"
                        type="file"
                        wire:model="imagen_nueva"
                        accept="image/*"
                    />

                    {{-- <div class="my-5">
                        <x-input-label :value="__('Imagen Actual')" />
                        <img src="{{ asset('storage/imagenes/' . $imagen) }}" alt="imagen de  $titulo" class="w-40">

                    </div> --}}
                    <div class="my-5">

                        @if (!$imagen_nueva)
                            <x-input-label :value="__('Imagen Actual')" />
                            <img src="{{ asset('storage/imagenes/' . $imagen) }}" alt="imagen de  $titulo" class="w-40">
                        @else
                            <x-input-label :value="__('Imagen Nueva')" />
                            <img src="{{ $imagen_nueva->temporaryUrl() }}" class="border border-gray-200 w-40">
                        @endif

                        {{-- @if ($imagen_nueva)
                        <x-input-label :value="__('Imagen Nueva')" />
                            <img src="{{ $imagen_nueva->temporaryUrl() }}" class="border border-gray-200" class="w-40">
                        @endif --}}

                    </div>

                    <x-input-error :messages="$errors->get('imagen')"
                        class="mt-2"
                        />
                </div>



                <div class="mt-4">
                    <x-input-label for="genero_id"
                        :value="__('Género del paciente')"
                        />
                    <select
                        wire:model="genero_id"
                        id="genero_id"
                        class="block mt-1 w-full border-gray-300 focus:border-indigo-500 dark:bg-gray-900 dark:text-gray-300 focus:ring-indigo-500 rounded-md shadow-sm'" >
                        <option selected hidden> --Seleccionar género-- </option>
                        @foreach ( $generos as $genero )
                        <option value="{{ $genero->id }}"> {{ $genero->genero }} </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('genero_id')"
                        class="mt-2" />
                </div>


                <div class="mt-4">
                    <x-input-label for="fecha_nacimiento"
                        :value="__('fecha de nacimiento')" />

                    <x-text-input id="fecha_nacimiento" class="block mt-1 w-full"
                        type="date"
                        wire:model="fecha_nacimiento"
                        :value="old('fecha_nacimiento')"
                        required
                        autofocus
                        />

                    <x-input-error :messages="$errors->get('fecha_nacimiento')"
                        class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="peso"
                        :value="__('Peso en kg')" />

                    <x-text-input id="peso"
                        class="block mt-1 w-full"
                        type="number"
                        wire:model="peso"
                        :value="old('peso')"
                        required
                        autofocus
                        />

                    <x-input-error :messages="$errors->get('peso')"
                        class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="estatura"
                        :value="__('Estatura en centimetros')" />

                    <x-text-input id="estatura"
                        class="block mt-1 w-full"
                        type="number"
                        wire:model="estatura"
                        :value="old('estatura')"
                        required
                        autofocus
                        />

                    <x-input-error :messages="$errors->get('estatura')"
                        class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="alergias"
                        :value="__('Alergías')"
                        />
                    <x-text-input id="alergias"
                        class="block mt-1 w-full"
                        type="text"
                        wire:model="alergias"
                        :value="old('alergias')"
                        placeholder="Ej.: penicilina"
                        required
                        autofocus
                        />
                    <x-input-error :messages="$errors->get('alergias')"
                        class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="antecedentes_familiares"
                        :value="__('Antecedentes familiares')"
                        />
                    <x-text-input id="antecedentes_familiares"
                    class="block mt-1 w-full"
                    type="text"
                    wire:model="antecedentes_familiares"
                    :value="old('antecedentes_familiares')"
                    placeholder="Ej.:Mi madre fue diabética"
                    required
                    autofocus
                    />
                    <x-input-error :messages="$errors->get('antecedentes_familiares')"
                        class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="enfermedades_cronicas"
                    :value="__('Enfermedades crónicas')"
                    />
                    <x-text-input id="enfermedades_cronicas"
                    class="block mt-1 w-full"
                    type="text"
                    wire:model="enfermedades_cronicas"
                    :value="old('enfermedades_cronicas')"
                    placeholder="Ej.: Diabetes, Hipertensión"
                    required
                    autofocus
                    />
                    <x-input-error :messages="$errors->get('enfermedades_cronicas')"
                        class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="procedimientos_quirurgicos"
                        :value="__('Procedimientos quirúrgicos')"
                        />
                    <x-text-input id="procedimientos_quirurgicos"
                        class="block mt-1 w-full"
                        type="text"
                        wire:model="procedimientos_quirurgicos"
                        :value="old('procedimientos_quirurgicos')"
                        placeholder="Ej.: Operación apendicitis, año 2011"
                        required
                        autofocus
                        />
                    <x-input-error :messages="$errors->get('procedimientos_quirurgicos')"
                        class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="condiciones_pasadas"
                        :value="__('Condiciones pasadas')"
                        />
                    <x-text-input id="condiciones_pasadas"
                        class="block mt-1 w-full"
                        type="text"
                        wire:model="condiciones_pasadas"
                        :value="old('condiciones_pasadas')"
                        placeholder="Ej.: Infarto, año 2019"
                        required
                        autofocus
                        />
                    <x-input-error :messages="$errors->get('condiciones_pasadas')"
                        class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="doctor"
                        :value="__('Nombre del doctor')"
                        />
                    <x-text-input id="doctor"
                        class="block mt-1 w-full"
                        type="text"
                        wire:model="doctor"
                        :value="old('doctor')"
                        placeholder="Ej.: Doctor Tasende Aranjuez"
                        required
                        autofocus
                        />
                    <x-input-error :messages="$errors->get('doctor')"
                        class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="clinica"
                        :value="__('Clínica donde se atiende')"
                        />
                    <x-text-input id="clinica"
                        class="block mt-1 w-full"
                        type="text"
                        wire:model="clinica"
                        :value="old('clinica')"
                        placeholder="Ej.: Clínica Marcial Fallas"
                        required
                        autofocus
                        />
                    <x-input-error :messages="$errors->get('clinica')"
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
                        placeholder="Ej.: me sentia mareada"
                        required
                        autofocus
                        />
                    <x-input-error :messages="$errors->get('observaciones')"
                        class="mt-2" />
                </div>

                {{-- <div class="mt-4">
                    <x-input-label for="historial_id"
                        :value="__('Historial')"
                        />
                    <x-text-input id="historial_id"
                        class="block mt-1 w-full"
                        type="text"
                        wire:model="historial_id"
                        :value="old('historial_id')"
                        placeholder="Ej.: me sentia mareada"
                        required
                        autofocus
                        />
                    <x-input-error :messages="$errors->get('observaciones')"
                        class="mt-2" />
                </div> --}}
                
                <x-primary-button class="mt-5">
                    {{ __('Guardar cambios') }}
                </x-primary-button>
        </form>
    </div>
</div>
