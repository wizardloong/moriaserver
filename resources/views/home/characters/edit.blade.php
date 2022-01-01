<x-home-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Редактирование
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('home.characters.index') }}">Назад</a>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('home.characters.update', ['character' => $character]) }}" method="POST">
        {{ method_field('PUT') }}

        @include('home.characters.partials.form')
        <button class="btn btn-success" type="submit">Сохранить</button>
    </form>
</x-home-layout>
