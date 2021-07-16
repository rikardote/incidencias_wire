<div class="px-4 py-4 sm:px-6 lg:px-8">

    <div class="grid grid-cols-2">


        <!-- PRIMERA COLUMNA -->
        <div>
            <x-jet-label value="Numero de empleado" />
            <!--  <x-jet-input class="relative w-3/4" wire:model.debounce.500ms="search" type="text" /> -->
            <x-jet-input wire:model="buscar" type="text" autocomplete="no" class="w-3/4" id="buscar" />
            @error('buscar')
                <small class="block mt-1 text-red-600">{{ $message }}</small>
            @else
                @if (count($empleados) > 0)
                    @if (!$picked)
                        <div class="px-3 pt-3 pb-0 rounded shadow">
                            @foreach ($empleados as $empleado)
                                <div style="cursor: pointer;">
                                    <a wire:click.defer="asignarUsuario('{{ $empleado->num_empleado }}')">
                                        {{ $empleado->num_empleado }} - {{ $empleado->fullname }}
                                    </a>
                                </div>

                            @endforeach
                        </div>
                    @endif
                @else
                    <small class="block mt-1 text-gray-700">Comienza a teclear para que aparezcan los resultados</small>
                @endif
            @enderror
        </div>


        <!-- SEGUNDA COLUMNA -->
        @if ($picked && $empleado)

            <div class="">

                <div class="w-full m-12 mx-auto text-gray-800 bg-gray-100 rounded">
                    <div class="flex w-full shadow-lg">
                        <div class="flex items-center justify-center w-full mt-2 mb-2 ml-2 mr-2 ">
                            <p class="w-full m-12 mx-auto mt-4 text-2xl text-center text-gray-800">
                                {{ $empleado->num_empleado }} - {{ $empleado->fullname }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="text-center text-black"> {{ $empleado->departamento->join }} </div>
                <div class="text-center text-black"> {{ $empleado->puesto->puesto }} </div>
                <div class="text-center text-black"> {{ $empleado->horario->horario }} </div>

                <table class="w-full m-12 mx-auto mt-4 text-gray-800 bg-gray-200 rounded-lg">
                    <thead>
                        <tr class="text-left border-b-2 border-gray-300">
                            <th class="px-4 py-3 text-center">Qna</th>
                            <th class="px-4 py-3 text-center">Codigo</th>
                            <th class="px-4 py-3 text-center">Fecha Inicial</th>
                            <th class="px-4 py-3 text-center">Fecha Final</th>
                            <th class="px-4 py-3 text-center">Dias</th>
                            <th class="px-4 py-3 text-center">Periodo</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($incidencias as $incidencia)
                            <tr class="bg-gray-100 border-b border-gray-200">
                                <td class="px-4 py-3 text-center">{{ $incidencia->qna->shortname }}</td>
                                <td class="px-4 py-3 text-center">{{ $incidencia->codigo->code }}</td>
                                <td class="px-4 py-3 text-center">{{ $incidencia->fecha_inicio->format('d/m/y') }}
                                </td>
                                <td class="px-4 py-3 text-center">{{ $incidencia->fecha_final->format('d/m/y') }}
                                </td>
                                <td class="px-4 py-3 text-center">{{ $incidencia->total_dias }}</td>
                                <td class="px-4 py-3 text-center">{{ $incidencia->periodo->fullname ?? '' }} </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        @endif



    </div>
</div>
