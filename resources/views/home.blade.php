<x-home-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Личный кабинет
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Это ваш личный кабинет. Для того чтобы начать играть, создайте персонажа.
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @can('viewAny', \App\Models\Character::class)
                        <div>
                            <a href="{{ route('home.characters.index') }}" class="btn btn-primary">Мои персонажи</a>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-home-layout>
