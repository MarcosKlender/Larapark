<x-app-layout>
    <x-slot name="header">
        <h2
            class="flex items-center justify-between h-6 text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Nueva Tarifa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="relative p-5 overflow-x-auto bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <form action="{{ route('rates.store') }}" method="POST">
                    @csrf
                    <div class="grid gap-3 text-white lg:grid-cols-2">
                        <div>
                            <label class="text-black dark:text-white">Nombre</label>
                            <span class="ml-3 text-red-400">
                                @error('name')
                                    *{{ $message }}
                                @enderror
                            </span>
                            <input type="text" name="name" autofocus
                                class="w-full mb-4 text-black uppercase border-gray-200 rounded">
                        </div>

                        <div>
                            <label class="text-black dark:text-white">Costo Por Hora</label>
                            <span class="ml-3 text-red-400">
                                @error('cost_per_hour')
                                    *{{ $message }}
                                @enderror
                            </span>
                            <input type="number" name="cost_per_hour"
                                class="w-full mb-4 text-black border-gray-200 rounded" step="0.01">
                        </div>

                        <input type="hidden" name="created_by" value="{{ Auth::user()->name }}">
                    </div>

                    <div class="flex items-center justify-between my-2">
                        <a href="{{ route('rates.index') }}"
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
