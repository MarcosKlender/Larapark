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
                                Costo Final
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
                                    @if ($vehicle->is_parked == '1')
                                        <!-- Modal Toggle -->
                                        <button data-modal-target="staticModal" data-modal-toggle="staticModal"
                                            data-id="{{ $vehicle->id }}" data-type="{{ $vehicle->type }}"
                                            data-plate="{{ $vehicle->plate }}"
                                            data-start-time="{{ $vehicle->start_time }}"
                                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none
                                    focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600
                                    dark:hover:bg-blue-700 dark:focus:ring-blue-800 modalToggleButton"
                                            type="button">
                                            Marcar Salida
                                        </button>
                                    @else
                                        $ {{ $vehicle->final_cost }}
                                    @endif
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

            <!-- Main modal -->
            <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white modalTitle"></h3>
                        </div>
                        <!-- Modal body -->
                        <form action="{{ route('vehicles.close') }}" method="POST">
                            <div class="p-6 space-y-6">
                                <div class="text-white grid lg:grid-cols-3 gap-3">
                                    @csrf

                                    <input type="hidden" name="id" id="modalVehicleId">
                                    <input type="hidden" name="end_date"
                                        value="{{ \Carbon\Carbon::today()->toDateString() }}">
                                    <input type="hidden" name="is_parked" id="modalIsParked" value="0">

                                    <div>
                                        <label class="text-black dark:text-white">Hora de Entrada</label>
                                        <input type="time" name="start_time" id="modalStartTime"
                                            class="text-black rounded border-gray-200 w-full mb-4" step="2"
                                            readonly>
                                    </div>

                                    <div>
                                        <label class="text-black dark:text-white">Hora de Salida</label>
                                        <input type="time" name="end_time" id="modalEndTime"
                                            class="text-black rounded border-gray-200 w-full mb-4" step="2"
                                            readonly>
                                    </div>

                                    <div>
                                        <label class="text-black dark:text-white">Tiempo Total</label>
                                        <input type="time" name="total_time" id="modalTotalTime"
                                            class="text-black rounded border-gray-200 w-full mb-4" step="2"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div
                                class="flex flex-row p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button type="submit"
                                    class="basis-1/2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Marcar
                                    Salida</button>
                                <button data-modal-hide="staticModal" type="button"
                                    class="basis-1/2 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
            <script src="{{ asset('js/flowbite-modal.js') }}"></script>

        </div>
    </div>
</x-app-layout>
