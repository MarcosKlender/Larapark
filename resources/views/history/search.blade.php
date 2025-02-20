<x-app-layout>
    <x-slot name="header">
        <h2
            class="flex items-center justify-between h-6 text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Historial') }}

            <a href="{{ route('history.index') }}"
                class="px-5 py-3 text-sm font-bold text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">NUEVA
                BÚSQUEDA</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            @if ($vehicles->isEmpty())
                <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                    <div class="p-6 text-center text-gray-900 dark:text-gray-100">
                        <span>¡No se han encontrado registros entre las fechas {{ $from }} y {{ $to }}!</span>
                    </div>
                </div>
            @else
                <div class="relative mb-4 overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Tipo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Placa
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Estado
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Fecha
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Hora Entrada
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tiempo Total
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Costo Final
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vehicles as $vehicle)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td scope="row" class="px-6 py-4 dark:text-white">
                                        {{ $vehicle->type }}
                                    </td>
                                    <td class="px-6 py-4 dark:text-white">
                                        {{ $vehicle->plate }}
                                    </td>
                                    <td class="px-6 py-4 dark:text-white">
                                        @if ($vehicle->is_parked == '1')
                                            <span
                                                class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">ACTIVO</span>
                                        @else
                                            <span
                                                class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">FINALIZADO</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 dark:text-white">
                                        {{ \Carbon\Carbon::parse($vehicle->start_date)->format('d-m-Y') }}
                                    </td>
                                    <td class="px-6 py-4 dark:text-white">
                                        {{ $vehicle->start_time }}
                                    </td>
                                    <td class="px-6 py-4 dark:text-white">
                                        {{ $vehicle->total_time }}
                                    </td>
                                    <td class="px-6 py-4 dark:text-white">
                                        $ {{ $vehicle->final_cost }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
