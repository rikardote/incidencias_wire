 <div class="px-4 py-4 sm:px-6 lg:px-8">

         <div class="flex px-4 mt-2 overflow-hidden bg-gray-100 rounded-lg shadow-lg xl:mx-8">
             <div class="w-1/2 mt-4 mb-4 ">
                 <div class="mr-2">
                     <x-jet-label value="Numero de empleado" />
                     <x-jet-input wire:model="search" type="text" />
                     <x-jet-input-error for="empleado.num_empleado" class="mt-2" />
                 </div>

                 <x-jet-label value="Nombre" />
                 <x-jet-input wire:model.defer="empleado.name" type="text" />
                 <x-jet-input-error for="empleado.name" class="mt-2" />
                 <div class="mr-2">
                     <x-jet-label value="Apellido Paterno" />
                     <x-jet-input wire:model.defer="empleado.father_lastname" type="text" />
                     <x-jet-input-error for="empleado.father_lastname" class="mt-2" />
                 </div>
                 <x-jet-label value="Apellido Materno" />
                 <x-jet-input wire:model.defer="empleado.mother_lastname" type="text" />
                 <x-jet-input-error for="empleado.mother_lastname" class="mt-2" />

                 <div class="mr-2">
                     <x-jet-label value="Tipo de contratacion" />
                     <select wire:model.defer="empleado.condicion_id"
                         class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                         <option value=""></option>
                         @foreach ($tipos_de_contratacion as $tipos)
                             <option value="{{ $tipos->id }}">{{ $tipos->condicion }}</option>
                         @endforeach
                     </select>
                     <x-jet-input-error for="empleado.mother_lastname" class="mt-2" />
                 </div>
                 <div class="mr-2">
                     <x-jet-label value="Fecha de ingreso" />
                     <x-jet-input wire:model.defer="empleado.fecha_ingreso" type="date" />
                     <x-jet-input-error for="empleado.fecha_ingreso" class="mt-2" />
                 </div>
             </div>

             <div class="w-1/2 mt-4 mb-4 ">
                 <div class="mr-2">
                     <x-jet-label value="Departamento" />
                     <select wire:model.defer="empleado.deparment_id"
                         class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                         <option value=""></option>
                         @foreach ($departamentos as $departamento)
                             <option value="{{ $departamento->id }}">{{ $departamento->code }} -
                                 {{ $departamento->description }}</option>
                         @endforeach
                     </select>
                 </div>
                 <x-jet-input-error for="empleado.deparment_id" class="mt-2" />

                 <x-jet-label value="Jornada" />
                 <select wire:model.defer="empleado.jornada_id"
                     class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                     <option value=""></option>
                     @foreach ($jornadas as $jornada)
                         <option value="{{ $jornada->id }}">{{ $jornada->jornada }} </option>
                     @endforeach
                 </select>
                 <x-jet-input-error for="empleado.jornada_id" class="mt-2" />

                 <x-jet-label value="Horario" />
                 <select wire:model.defer="empleado.horario_id"
                     class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                     <option value=""></option>
                     @foreach ($horarios as $horario)
                         <option value="{{ $horario->id }}">{{ $horario->horario }} </option>
                     @endforeach
                 </select>
                 <x-jet-input-error for="empleado.horario_id" class="mt-2" />

                 <x-jet-label value="Puesto" />
                 <select wire:model.defer="empleado.puesto_id"
                     class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                     <option value=""></option>
                     @foreach ($puestos as $puesto)
                         <option value="{{ $puesto->id }}">{{ $puesto->puesto }} </option>
                     @endforeach
                 </select>
                 <x-jet-input-error for="empleado.puesto_id" class="mt-2" />
                 @if (!$nuevo_empleado)
                    <x-jet-label value="Antiguedad" />
                    <x-jet-input type="text" value=" {{$empleado->antiguedad}} " />
                 @endif

                 <div class="">
                     <span class="text-gray-500">Otros</span>
                     <div class="mt-2">
                         <label class="inline-flex items-center">
                             <x-jet-checkbox wire:model.defer="empleado.estancia" type="checkbox" />
                             <x-jet-input-error for="empleado.estancia" class="mt-2" />
                             <span class="ml-2">Estancia</span>
                         </label>

                         <label class="inline-flex items-center ml-6">
                             <x-jet-checkbox wire:model.defer="empleado.lactancia" type="checkbox" />
                             <x-jet-input-error for="empleado.lactancia" class="mt-2" />
                             <span class="ml-2">Lactancia</span>
                         </label>

                         <label class="inline-flex items-center ml-6">
                             <x-jet-checkbox wire:model.defer="empleado.comisionado" type="checkbox" />
                             <x-jet-input-error for="empleado.comisionado" class="mt-2" />
                             <span class="ml-2">Comision</span>
                         </label>

                     </div>
                 </div>

             </div>
         </div>

         <div class="flex items-center justify-end py-4">
             @if ($nuevo_empleado)
                <x-jet-button wire:click="save" class=""> Guardar </x-jet-button>
             @else
                <x-jet-button wire:click="update"> Editar Valores </x-jet-button>
             @endif
         </div>




 </div>

 @push('js')


    @endpush
