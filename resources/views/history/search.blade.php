<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center justify-between h-6">
            {{ __('Historial') }}

            <a href="{{ route('history.index') }}"
                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-bold rounded-lg py-3
                text-sm px-5 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">NUEVA
                BÚSQUEDA</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if ($vehicles->isEmpty())
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                        <span>¡No se han encontrado registros entre las fechas {{ $from }} y {{ $to }}!</span>
                    </div>
                </div>
            @else
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-4">
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
