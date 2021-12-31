<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Список всех персонажей
        </h2>
    </x-slot>

<ul>
@foreach($characters as $character)
    <li><a href="{{ route('dashboard.characters.show', ['character' => $character]) }}">{{ $character->name }}</a></li>
@endforeach
</ul>

<a href="{{ route('dashboard.characters.create') }}" class="btn btn-primary">Добавить персонажа</a>
</x-app-layout>
