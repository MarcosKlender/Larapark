<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center justify-between">
            {{ __('Editar Vehículo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <form action="{{ route('vehicles.update', $vehicle) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="text-white grid lg:grid-cols-2 gap-3">
                        <div>
                            <label>Tipo de Vehículo</label>
                            <span class="ml-3 text-red-400">
                                @error('type')
                                    *{{ $message }}
                                @enderror
                            </span>
                            <select name="type" class="text-black rounded border-gray-200 w-full mb-4">
                                <option value="LIVIANO" {{ $vehicle->type == 'LIVIANO' ? 'selected' : '' }}>LIVIANO
                                </option>
                                <option value="MOTO" {{ $vehicle->type == 'MOTO' ? 'selected' : '' }}>MOTO</option>
                            </select>
                        </div>

                        <div>
                            <label>Placa</label>
                            <span class="ml-3 text-red-400">
                                @error('plate')
                                    *{{ $message }}
                                @enderror
                            </span>
                            <input type="text" name="plate" class="text-black rounded border-gray-200 w-full mb-4"
                                maxlength="10" value="{{ old('plate', $vehicle->plate) }}">
                        </div>

                        <div>
                            <label>Fecha de Ingreso</label>
                            <span class="ml-3 text-red-400">
                                @error('start_date')
                                    *{{ $message }}
                                @enderror
                            </span>
                            <input type="date" name="start_date"
                                class="text-black rounded border-gray-200 w-full mb-4"
                                value="{{ old('start_date', $vehicle->start_date) }}" readonly>
                        </div>

                        <div>
                            <label>Fecha de Ingreso</label>
                            <span class="ml-3 text-red-400">
                                @error('start_time')
                                    *{{ $message }}
                                @enderror
                            </span>
                            <input type="time" name="start_time"
                                class="text-black rounded border-gray-200 w-full mb-4" step="2"
                                value="{{ old('start_time', $vehicle->start_time) }}" readonly>
                        </div>

                        <input type="hidden" name="created_by" value="{{ Auth::user()->name }}">
                    </div>

                    <div class="mt-4 mb-4 flex items-center justify-between">
                        <a href="{{ route('vehicles.index') }}" class="text-red-400">Volver</a>

                        <input type="submit" value="Enviar" class="text-green-400 rounded">
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-app-layout>
