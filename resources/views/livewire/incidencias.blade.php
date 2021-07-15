<div class="px-4 py-4 sm:px-6 lg:px-8">

    <div class="grid grid-cols-2">


        <!-- PRIMERA COLUMNA -->
        <div>
            <x-jet-label value="Numero de empleado" />
            <x-jet-input class="relative w-3/4" wire:model.debounce.500ms="search" type="text" />
        </div>





        <!-- SEGUNDA COLUMNA -->
        @if ($empleado)

            <div class="">
                <div class="px-4 py-4 mx-auto">

                        <div class="flex flex-col justify-center bg-white border border-gray-300 rounded shadow-lg">
                            <div class="flex w-full ">
                                <div class="flex items-center justify-center w-full mt-2 mb-4 bg-green-500">
                                    <p class="text-3xl font-bold text-center text-black">
                                        {{ $empleado->num_empleado }} - {{ $empleado->fullname }}
                                    </p>
                                </div>
                            </div>

                        </div>

                </div>
                <div class="text-center text-black">

                        {{ $empleado->departamento->join }}
                </div>
                <div class="text-center text-black">

                        {{ $empleado->horario->horario }} | {{ $empleado->puesto->puesto }}

                </div>
                <table class="w-full m-5 mx-auto text-gray-800 bg-gray-200 rounded-lg">
                    <thead>
                        <tr class="text-left border-b-2 border-gray-300">
                            <th class="px-4 py-3 text-center">Qna</th>
                            <th class="px-4 py-3 text-center">Codigo</th>
                            <th class="px-4 py-3 text-center">Fecha Inicial</th>
                            <th class="px-4 py-3 text-center">Fecha Final</th>
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
                                <td class="px-4 py-3 text-center">{{ $incidencia->fecha_final->format('d/m/y') }}</td>
                                <td class="px-4 py-3 text-center">{{ $incidencia->periodo->fullname ?? '' }} </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        @endif

    </div>
</div>
