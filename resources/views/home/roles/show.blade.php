<x-home-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Show Role
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('home.roles.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $role->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permissions:</strong>
                @if(!$role->permissions->isEmpty())
                    @foreach($role->permissions as $permission)
                        <label class="label label-success">{{ $permission->name }},</label>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-home-layout>
