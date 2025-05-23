<div class="">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Rector
        </h2>
    </x-slot>
    <div class="py-12 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg max-w-7xl mx-auto ">
        <div class="max-w-xl">
            @if (session()->has('success'))
            <div class="p-2 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <span class="font-medium">Mensaje: </span> {{ session('success') }}
            </div>
            @endif
            <section>
                <header>
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        Información del rector
                    </h2>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Ingrese los datos del rector para el registro.
                    </p>
                </header>

                <form wire:submit.prevent="guardar" class="mt-6 space-y-6">
                    <div>
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="nombre_rector">
                            Nombre del rector
                        </label>
                        <input wire:model="nombre" type="text" id="nombre_rector" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" required>
                        @error('nombre_rector') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="tipo_documento">
                            Tipo de documento
                        </label>
                        <select wire:model="tipo_documento" id="tipo_documento" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" required>
                            <option value="">Seleccione...</option>
                            <option value="C.C">Cédula de ciudadanía</option>
                            <option value="T.I">Tarjeta de identidad</option>
                            <option value="C.E">Cédula de extranjería</option>
                        </select>
                        @error('tipo_documento') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="documento">
                            Documento
                        </label>
                        <input wire:model="documento" type="text" id="documento" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" required>
                        @error('documento') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="documento">
                            Celular
                        </label>
                        <input wire:model="celular" type="text" id="documento" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" required>
                        @error('celular') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Guardar
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>