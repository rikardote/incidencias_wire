<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Captura de Incidencias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-12">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <livewire:incidencias />
            </div>
        </div>
    </div>
</x-app-layout>
