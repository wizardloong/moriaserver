<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Добавить нового персонажа
        </h2>
    </x-slot>

<form action="{{ route('dashboard.characters.store') }}" method="POST">
    @include('dashboard.characters.partials.form')
    <button class="btn btn-success" type="submit">Сохранить</button>
</form>
</x-app-layout>
