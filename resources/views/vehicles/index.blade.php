<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center justify-between h-6">
            {{ __('Vehículos') }}

            <a href="{{ route('vehicles.create') }}"
                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-bold rounded-lg py-3
                text-sm px-5 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">REGISTRAR</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @include('vehicles._messages')

            @if ($vehicles->isEmpty())
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __('¡No se han encontrado registros el día de hoy!') }}
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
                                        <div class="inline-flex">
                                            <a href="{{ route('vehicles.edit', $vehicle) }}"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="w-6 h-6">
                                                    <path
                                                        d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                                    <path
                                                        d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                                </svg>
                                            </a>
                                            <form action="{{ route('vehicles.destroy', $vehicle) }}" method="POST"
                                                class="text-red-400">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                                    onclick="return confirm('¿Está seguro de eliminar este vehículo?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="w-6 h-6">
                                                        <path fill-rule="evenodd"
                                                            d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

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
                                            class="text-black rounded border-gray-200 w-full mb-4" step="1"
                                            readonly>
                                    </div>

                                    <div>
                                        <label class="text-black dark:text-white">Hora de Salida</label>
                                        <input type="time" name="end_time" id="modalEndTime"
                                            class="text-black rounded border-gray-200 w-full mb-4" step="1"
                                            readonly>
                                    </div>

                                    <div>
                                        <label class="text-black dark:text-white">Tiempo Total</label>
                                        <input type="time" name="total_time" id="modalTotalTime"
                                            class="text-black rounded border-gray-200 w-full mb-4" step="1"
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
