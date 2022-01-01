<x-home-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Список всех персонажей
        </h2>
    </x-slot>

<ul>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                @can('viewAny', \App\Models\Character::class)
                    <a class="btn btn-success" href="{{ route('home.characters.create') }}">Добавить персонажа</a>
                @endcan
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Имя</th>
            <th width="280px">Действия</th>
        </tr>
        @foreach ($characters as $character)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $character->name }}</td>
                <td>
                    @can('view', $character)
                        <a class="btn btn-info" href="{{ route('home.characters.show', $character) }}">Просмотр</a>
                    @endcan

                    @can('update', $character)
                        <a class="btn btn-primary" href="{{ route('home.characters.edit', $character) }}">Редактировать</a>
                    @endcan

                    @can('delete', $character)
                        {!! Form::open(['method' => 'DELETE','route' => ['home.characters.destroy', $character],'style'=>'display:inline']) !!}
                        {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>
</x-home-layout>
