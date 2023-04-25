<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Escritorio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    {{ __('¡Bienvenido a Larapark, el mejor sistema gratuito para control de parquederos!') }}
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid sm:grid-cols-3 gap-5 text-center">
                        <div class="grid gap-3">
                            <span>TOTAL DE VEHÍCULOS</span>
                            <b class="text-5xl">{{ $vehicles_count }}</b>
                        </div>
                        <div class="grid gap-3">
                            <span>VEHÍCULOS ACTIVOS</span>
                            <b class="text-5xl">{{ $active_count }}</b>
                        </div>
                        <div class="grid gap-3">
                            <span>TOTAL RECAUDADO</span>
                            <b class="text-5xl">$ {{ $money_count }}</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
