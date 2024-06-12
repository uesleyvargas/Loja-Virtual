<x-app-layout>

    <div class="px-6 mx-auto max-w-7xl">
        <x-slot name="header">
            <h2 class="font-semibold text-2xl text-gray-800">
                Cadastro de Tipo
            </h2>
        </x-slot>

        <x-content-div>

            <form class="mt-4" action="{{ url('types/new') }}" method="POST">
                @csrf

                <x-input-label for="name" :value="__('Nome')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />

                <div class="grid grid-cols-2 gap-4 mt-3">
                    <button class="text-start">
                        <a class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-center"
                            href="{{ url('/types') }}">Voltar</a>
                    </button>
                    <div class="text-end">
                        <button class="text-end bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                            type="submit">Salvar</button>
                    </div>
                </div>

            </form>
        </x-content-div>

    </div>

</x-app-layout>