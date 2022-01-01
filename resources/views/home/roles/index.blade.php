<x-home-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Role Management
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                @can('create', \App\Models\Role::class)
                    <a class="btn btn-success" href="{{ route('home.roles.create') }}"> Create New Role</a>
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
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('home.roles.show',$role->id) }}">Show</a>
                    @can('update', $role)
                        <a class="btn btn-primary" href="{{ route('home.roles.edit', $role->id) }}">Edit</a>
                    @endcan
                    @can('delete', $role)
                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>

    {!! $roles->render() !!}

</x-home-layout>
