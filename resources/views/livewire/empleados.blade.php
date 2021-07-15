<div class="px-4 py-4 sm:px-6 lg:px-8">

    <div class="grid grid-cols-2">


        <!-- PRIMERA COLUMNA -->

        <div class="m-3">
            <div class="">
                <x-jet-label value="Numero de empleado" />
                <div class="relative flex w-3/4 mb-3">
                    <x-jet-input class="relative w-full" wire:model.debounce.500ms="search" type="text" />
                    @if ($search)
                        <span wire:click="clear_search"
                            class="absolute right-0 z-10 items-center justify-center w-8 h-full py-3 pr-3 text-base font-normal leading-snug text-center bg-transparent rounded cursor-pointer">
                            <i class="text-red-500 far fa-times-circle"></i>
                        </span>
                    @endif
                </div>
                <x-jet-input-error for="empleado.num_empleado" class="mt-2" />
            </div>
            <div class="">
                <x-jet-label value="Nombre" />
                <x-jet-input class="w-3/4" wire:model.defer="empleado.name" type="text" />
                <x-jet-input-error for="empleado.name" class="mt-2" />
            </div>
            <div class="">
                <x-jet-label value="Apellido Paterno" />
                <x-jet-input class="w-3/4" wire:model.defer="empleado.father_lastname" type="text" />
                <x-jet-input-error for="empleado.father_lastname" class="mt-2" />
            </div>
            <div class="">
                <x-jet-label value="Apellido Materno" />
                <x-jet-input class="w-3/4" wire:model.defer="empleado.mother_lastname" type="text" />
                <x-jet-input-error for="empleado.mother_lastname" class="mt-2" />
            </div>

            <div class="">
                <x-jet-label value="Tipo de contratacion" />
                <select wire:model.defer="empleado.condicion_id"
                    class="w-3/4 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value=""></option>
                    @foreach ($tipos_de_contratacion as $tipos => $key)
                        <option value="{{ $key }}">{{ $tipos }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="empleado.mother_lastname" class="mt-2" />
            </div>
            <div class="">
                <x-jet-label value="Fecha de ingreso" />
                <x-jet-input class="w-3/4" wire:model.defer="empleado.fecha_ingreso" type="date" />
                <x-jet-input-error for="empleado.fecha_ingreso" class="mt-2" />
            </div>
        </div>


        <!-- SEGUNDA COLUMNA -->

        <div class="m-3">
            <div class="">
                <x-jet-label value="Departamento" />
                <select wire:model.defer="empleado.deparment_id"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value=""></option>
                    @foreach ($departamentos as $departamento => $key)
                        <option value="{{ $key }}">{{ $departamento }}</option>
                    @endforeach
                </select>
            </div>
            <div class="">
                <x-jet-input-error for="empleado.deparment_id" class="mt-2" />
                <x-jet-label value="Jornada" />
                <select wire:model.defer="empleado.jornada_id"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value=""></option>
                    @foreach ($jornadas as $jornada => $key)
                        <option value="{{ $key }}">{{ $jornada }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="empleado.jornada_id" class="mt-2" />
            </div>
            <div class="">
                <x-jet-label value="Horario" />
                <select wire:model.defer="empleado.horario_id"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value=""></option>
                    @foreach ($horarios as $horario => $key)
                        <option value="{{ $key }}">{{ $horario }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="empleado.horario_id" class="mt-2" />
            </div>
            <div class="">
                <x-jet-label value="Puesto" />
                <select wire:model.defer="empleado.puesto_id"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value=""></option>
                    @foreach ($puestos as $puesto => $key)
                        <option value="{{ $key }}">{{ $puesto }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="empleado.puesto_id" class="mt-2" />
            </div>
            <div class="">
                @if (!$nuevo_empleado)
                    <x-jet-label value="Antiguedad" />
                    <x-jet-input class="w-full" type="text" value=" {{ $empleado->antiguedad }} " />
                @endif
            </div>

            <div class="">

                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <x-jet-checkbox wire:model.defer="empleado.estancia" type="checkbox" />
                        <x-jet-input-error for="empleado.estancia" class="mt-2" />
                        <span class="ml-2">Estancia</span>
                    </label>

                    <label class="inline-flex items-center ">
                        <x-jet-checkbox wire:model.defer="empleado.lactancia" type="checkbox" />
                        <x-jet-input-error for="empleado.lactancia" class="mt-2" />
                        <span class="ml-2">Lactancia</span>
                    </label>

                    <label class="inline-flex items-center ">
                        <x-jet-checkbox wire:model.defer="empleado.comisionado" type="checkbox" />
                        <x-jet-input-error for="empleado.comisionado" class="mt-2" />
                        <span class="ml-2">Comision</span>
                    </label>

                </div>
                <div class="flex items-center justify-end py-4">
                    @if ($nuevo_empleado)
                        <x-jet-button wire:click="save" class=""> Guardar </x-jet-button>
                    @else
                        <x-jet-button wire:click="update"> Editar Valores </x-jet-button>

                    @endif
                </div>
                <div wire:loading.delay wire:target="save, update">
                    <div class="loading-spinner">
                        <div class="la-ball-spin la-2x">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
