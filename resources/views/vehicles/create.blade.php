<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center justify-between">
            {{ __('Registrar Vehículo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <form action="{{ route('vehicles.store') }}" method="POST">
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
                                <option value="LIVIANO">LIVIANO</option>
                                <option value="MOTO">MOTO</option>
                            </select>
                        </div>

                        <div>
                            <label>Placa</label>
                            <span class="ml-3 text-red-400">
                                @error('plate')
                                    *{{ $message }}
                                @enderror
                            </span>
                            <input type="text" name="plate"
                                class="text-black rounded border-gray-200 w-full mb-4 uppercase" maxlength="10">
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
                                value="{{ \Carbon\Carbon::today()->format('Y-m-d') }}" readonly>
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
                                value="{{ \Carbon\Carbon::now()->format('H:i:s') }}" readonly>
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
