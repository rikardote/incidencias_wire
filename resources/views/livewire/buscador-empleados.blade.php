<div>
    <div class="flex flex-wrap ">
        <div class="pl-4 pr-4 md:w-2/3">
            <div class="mb-4">
                <label for="buscar">
                    <strong>Buscar</strong>
                    @if($picked)
                        <span class="inline-block p-1 text-sm font-semibold leading-none text-center text-white align-baseline bg-green-500 rounded hover:green-600">Picked</span>
                    @else
                        <span class="inline-block p-1 text-sm font-semibold leading-none text-center text-white align-baseline bg-red-600 rounded hover:bg-red-700">Picked</span>
                    @endif
                </label>
                <input wire:model="buscar"
                    wire:keydown.enter="asignarPrimero()" type="text" autocomplete="no" class="block w-full px-2 py-1 mb-1 text-base leading-normal text-gray-800 bg-white border border-gray-200 rounded appearance-none" id="buscar">
                @error("buscar")
                    <small class="block mt-1 text-red-600">{{$message}}</small>
                @else
                    @if(count($usuarios)>0)
                        @if(!$picked)
                        <div class="px-3 pt-3 pb-0 rounded shadow">
                            @foreach($usuarios as $usuario)
                                <div style="cursor: pointer;">
                                    <a wire:click="asignarUsuario('{{ $usuario->num_empleado }}')">
                                        {{ $usuario->fullname }}
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
        </div>

    </div>
</div>
