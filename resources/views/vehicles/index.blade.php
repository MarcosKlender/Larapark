<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center justify-between">
            {{ __('Vehículos') }}

            <a href="{{ route('vehicles.create') }}" class="text-green-400">Registrar</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
                                Fecha
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Hora Entrada
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Finalizar
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
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
                                    {{ \Carbon\Carbon::parse($vehicle->start_date)->format('d-m-Y') }}
                                </td>
                                <td class="px-6 py-4 dark:text-white">
                                    {{ $vehicle->start_time }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Marcar
                                        Salida</a>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('vehicles.edit', $vehicle) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                                    <form action="{{ route('vehicles.destroy', $vehicle) }}" method="POST"
                                        class="text-red-400">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Eliminar" class="text-red-400"
                                            onclick="return confirm('¿Está seguro de eliminar este vehículo?')">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
