<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Просмотр персонажа
        </h2>
    </x-slot>

Имя: {{ $character->name }} <br />
Создан: {{ $character->created_at->format('d.m.Y') }} <br />

<a href="{{ route('dashboard.characters.edit', ['character', $character]) }}" class="btn btn-primary">Редактировать</a>
    <form action="{{ route('dashboard.characters.destroy', ['character' => $character]) }}" method="POST">
        {{ method_field('DELETE') }}
        @csrf
        <button type="submit" class="btn btn-primary">Удалить</button>
    </form>
<a href="{{ route('dashboard.characters.index') }}" class="btn btn-primary">Вернуться к списку персонажей</a>
</x-app-layout>
