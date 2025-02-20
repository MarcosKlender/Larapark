<x-app-layout>
    <x-slot name="header">
        <h2 class="h-6 text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Escritorio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-center text-gray-900 dark:text-gray-100">
                    {{ __('¡Bienvenido a Larapark, el mejor sistema gratuito para control de parqueaderos!') }}
                </div>
            </div>
        </div>

        <div class="mx-auto mt-5 max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col justify-center gap-5 text-center text-gray-900 sm:flex-row dark:text-gray-100">
                <div class="flex flex-col w-full gap-2 p-6 bg-white shadow-sm sm:w-1/3 dark:bg-gray-800 sm:rounded-lg">
                    <span>TOTAL DE VEHÍCULOS</span>
                    <b class="text-5xl">{{ $vehicles_count }}</b>
                </div>
                <div class="flex flex-col w-full gap-2 p-6 bg-white shadow-sm sm:w-1/3 dark:bg-gray-800 sm:rounded-lg">
                    <span>VEHÍCULOS ACTIVOS</span>
                    <b class="text-5xl">{{ $active_count }}</b>
                </div>
                <div class="flex flex-col w-full gap-2 p-6 bg-white shadow-sm sm:w-1/3 dark:bg-gray-800 sm:rounded-lg">
                    <span>TOTAL RECAUDADO</span>
                    <b class="text-5xl">$ {{ $money_count }}</b>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
