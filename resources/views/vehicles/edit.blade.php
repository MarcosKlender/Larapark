<x-app-layout>
    <x-slot name="header">
        <h2
            class="flex items-center justify-between h-6 text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Editar Vehículo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="relative p-5 overflow-x-auto bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <form action="{{ route('vehicles.update', $vehicle) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="grid gap-3 text-white lg:grid-cols-2">
                        <div>
                            <label class="text-black dark:text-white">Tipo de Vehículo</label>
                            <span class="ml-3 text-red-400">
                                @error('type')
                                    *{{ $message }}
                                @enderror
                            </span>
                            <select name="type" class="w-full mb-4 text-black border-gray-200 rounded">
                                @foreach ($types as $type)
                                    <option value="{{ $type }}" {{ $vehicle->type == $type ? 'selected' : '' }}>
                                        {{ $type }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="text-black dark:text-white">Placa</label>
                            <span class="ml-3 text-red-400">
                                @error('plate')
                                    *{{ $message }}
                                @enderror
                            </span>
                            <input type="text" name="plate"
                                class="w-full mb-4 text-black uppercase border-gray-200 rounded" maxlength="10"
                                value="{{ old('plate', $vehicle->plate) }}">
                        </div>

                        <div>
                            <label class="text-black dark:text-white">Fecha de Ingreso</label>
                            <span class="ml-3 text-red-400">
                                @error('start_date')
                                    *{{ $message }}
                                @enderror
                            </span>
                            <input type="date" name="start_date"
                                class="w-full mb-4 text-black border-gray-200 rounded"
                                value="{{ old('start_date', $vehicle->start_date) }}">
                        </div>

                        <div>
                            <label class="text-black dark:text-white">Fecha de Ingreso</label>
                            <span class="ml-3 text-red-400">
                                @error('start_time')
                                    *{{ $message }}
                                @enderror
                            </span>
                            <input type="time" name="start_time"
                                class="w-full mb-4 text-black border-gray-200 rounded" step="1"
                                value="{{ old('start_time', $vehicle->start_time) }}">
                        </div>

                        <input type="hidden" name="created_by" value="{{ Auth::user()->name }}">
                    </div>

                    <div class="flex items-center justify-between my-2">
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
