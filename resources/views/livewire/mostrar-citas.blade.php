<div>
    <div class=" mt-5 mb-12 p-2 md:p-7 bg-cyan-100 shadow-xl border border-gray-300 rounded-lg">
        @forelse ( $citas as $cita)
        <div>
            <div class="flex justify-between gap-x-1 mb-5">
                <div class="w-4/12 border border-gray-500 rounded p-3 bg-white flex flex-col justify-center items-center">
                    <p class="font-bold text-gray-800 text-center text-5xl">{{Carbon\Carbon::parse($cita->fecha)->isoFormat('D')}}</p>
                    <p class="font-semibold text-gray-500 text-center uppercase ">{{Carbon\Carbon::parse($cita->fecha)->isoFormat('MMM')}}</p>
                </div>
    
                <div class="w-8/12 border border-gray-500 rounded p-3 bg-white">
                    <p class="font-bold uppercase">{{$cita->clinica}}</p>
                    <div class="md:flex  gap-4">
                        <p class="font-semibold">{{Carbon\Carbon::parse($cita->fecha)->isoFormat('dddd,')}} <span class="font-normal">{{Carbon\Carbon::parse($cita->fecha)->isoFormat('D-M-YYYY')}}</span> </p>
    
                        <p class="font-semibold">{{Carbon\Carbon::parse($cita->hora)->format('H:i')}}</p>
                    </div>
                    <div class="lg:flex gap-5">
    
                        <p>medicina: <span class="font-bold uppercase">{{$cita->consulta}}</span> </p>
                        @if (!$cita->doctor)
    
                        @else
                            <p><span class="font-bold">{{$cita->doctor}}</span> </p>
                        @endif
                    </div>
                    @if (!$cita->sala)
    
                    @else
                    <p>sala: <span class="font-bold">{{$cita->sala}}</span> </p>
                    @endif
    
    
                    @if (!$cita->observaciones)
    
                    @else
                        <p><span class="font-semibold">{{$cita->observaciones}}</span> </p>
                    @endif
    
                    <p class="text-end text-sm">Cita creada: <span class="font-semibold">{{$cita->created_at->diffForHumans()}}</span> </p>
                    <div class="mt-5 flex justify-between items-center gap-2 print:hidden">
                        <a
                        href="{{ route('citas.editar', $cita->id ) }}" class="text-indigo-500 hover:text-indigo-700 uppercase font-semibold cursor-pointer ">
    
                        {{-- href="{{ route('controles.editar', $control->id ) }}" --}}
    
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg> --}}
                            Editar</a>
    
    
    
    
                            <button
                                wire:click="$dispatch('mostrarAlerta', {id: {{ $cita->id}}})"
                                class="text-red-600 hover:text-red-700 uppercase font-semibold cursor-pointer ">
    
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#fcfcfc" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"/></svg> --}}
    
                                Eliminar</button>
    
                    </div>
                </div>
            </div>
    
    
    
    
                </div>
    
    
                @empty
                <div class="">
                    <h3 class="font-bold text-center text-gray-600 uppercase"> Aún no hay citas médicas que mostrar</>
                    </div>
                    @endforelse
                </div>
                <div class="mt-5 mb-5 px-5">
                    {{$citas->links()}}
                </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        document.addEventListener('livewire:initialized', () => {
            @this.on('mostrarAlerta', citaId => {
                Swal.fire({
                    title: '¿Eliminar Cita?',
                    text: "Una cita eliminada no se puede recuperar!!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // ELiminar vacante
                        @this.call('eliminarCita',citaId);
                        Swal.fire(
                            'Se eliminó tu cita médica',
                            'Eliminada correctamente',
                            'success'
                        )
                    }
                })

            });
        });

    </script>
@endpush
