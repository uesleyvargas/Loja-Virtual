<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            Lista de Tipos
        </h2>
    </x-slot>

    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($message = Session::get('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    <strong class="font-bold">{{ $message }}</strong>
                </div>
            @endif

            <a href="{{ url('/dashboard') }}"
                class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">Voltar</a>

            <a href="{{ url('/types/new') }}"
                class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-100 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-900 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">Adicionar Tipo</a>

            <x-content-div>
                <table class="min-w-full divide-y">
                    <thead class="bg-gray-50">
                        <tr>
                            <x-table-label :value="__('Nome')"></x-table-label>
                            <x-table-label></x-table-label>
                            <th class="py-2 px-4 border-b-2 border-gray-200 ">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach ($types as $type)
                            <tr>
                                <x-table-content>{{ $type['name'] }}</x-table-content>

                                <td class="px-6 py-4 whitespace-nowrap text-right space-x-2">
                                    <a href="{{ url('/types/update', ['id' => $type->id]) }}"
                                    class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded inline-block focus:outline-none focus:shadow-outline">EDITAR</a>
                                    <a href="{{ url('/types/delete', ['id' => $type->id]) }}"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-block focus:outline-none focus:shadow-outline" onclick="return confirm('Confirmar exclusão?')">DELETAR</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-content-div>

        </div>
    </div>

</x-app-layout>