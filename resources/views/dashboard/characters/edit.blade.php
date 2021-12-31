<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Редактирование
        </h2>
    </x-slot>

<form action="{{ route('dashboard.characters.update', ['character' => $character]) }}" method="POST">
    {{ method_field('PUT') }}

    @include('dashboard.characters.partials.form')
    <button class="btn btn-success" type="submit">Сохранить</button>
</form>

<a href="{{ route('dashboard.characters.index') }}" class="btn btn-primary">Вернуться к списку персонажей</a>
</x-app-layout>
