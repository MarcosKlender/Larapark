<x-app-layout>
    <x-slot name="header">
        <h2
            class="flex items-center justify-between text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Registrar Vehículo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="relative p-5 overflow-x-auto shadow-md sm:rounded-lg">
                <form action="{{ route('vehicles.store') }}" method="POST">
                    @csrf
                    <div class="grid gap-3 text-white lg:grid-cols-2">
                        <div>
                            <label class="text-black dark:text-white">Tipo de Vehículo</label>
                            <span class="ml-3 text-red-400">
                                @error('type')
                                    *{{ $message }}
                                @enderror
                            </span>
                            @if ($types->count() == 0)
                                <select class="w-full mb-4 text-black border-gray-200 rounded" disabled>
                                    <option>DEBES CREAR UNA TARIFA PRIMERO</option>
                                </select>
                            @else
                                <select name="type" class="w-full mb-4 text-black border-gray-200 rounded">
                                    @foreach ($types as $type)
                                        <option value="{{ $type }}">{{ $type }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>

                        <div>
                            <label class="text-black dark:text-white">Placa</label>
                            <span class="ml-3 text-red-400">
                                @error('plate')
                                    *{{ $message }}
                                @enderror
                            </span>
                            <input type="text" name="plate"
                                class="w-full mb-4 text-black uppercase border-gray-200 rounded" maxlength="10">
                        </div>

                        <div>
                            <label class="text-black dark:text-white">Fecha de Entrada</label>
                            <span class="ml-3 text-red-400">
                                @error('start_date')
                                    *{{ $message }}
                                @enderror
                            </span>
                            <input type="date" name="start_date"
                                class="w-full mb-4 text-black border-gray-200 rounded"
                                value="{{ \Carbon\Carbon::today()->format('Y-m-d') }}" readonly>
                        </div>

                        <div>
                            <label class="text-black dark:text-white">Hora de Entrada</label>
                            <span class="ml-3 text-red-400">
                                @error('start_time')
                                    *{{ $message }}
                                @enderror
                            </span>
                            <input type="time" name="start_time"
                                class="w-full mb-4 text-black border-gray-200 rounded" step="1"
                                value="{{ \Carbon\Carbon::now()->format('H:i:s') }}" readonly>
                        </div>

                        <input type="hidden" name="created_by" value="{{ Auth::user()->name }}">
                    </div>

                    <div class="flex items-center justify-between mt-4 mb-4">
                        <a href="{{ route('vehicles.index') }}"
                            class="px-5 py-3 text-sm font-medium font-bold text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">VOLVER</a>

                        <button type="submit"
                            class="px-5 py-3 text-sm font-medium font-bold text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">ENVIAR
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
