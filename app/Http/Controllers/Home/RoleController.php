<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\Roles\CreateRequest;
use App\Http\Requests\Home\Roles\DestroyRequest;
use App\Http\Requests\Home\Roles\EditRequest;
use App\Http\Requests\Home\Roles\IndexRequest;
use App\Http\Requests\Home\Roles\ShowRequest;
use App\Http\Requests\Home\Roles\StoreRequest;
use App\Http\Requests\Home\Roles\UpdateRequest;
use App\Models\Permission;
use App\Models\Role;
use function redirect;
use function view;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexRequest $request)
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(5);
        return view('home.roles.index', compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateRequest $request)
    {
        $permissions = Permission::all();
        return view('home.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $role = Role::create([
            'name' => $request->input('name'),
            'code' => $request->input('code')
        ]);
        $role->rermissions()->sync($request->input('permission'));

        return redirect()->route('home.roles.index')
            ->with('success', 'Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(ShowRequest $request, Role $role)
    {
//        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
//            ->where("role_has_permissions.role_id", $id)
//            ->get();
        return view('home.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EditRequest $request, Role $role)
    {
        $permissions = Permission::all();
//        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
//            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
//            ->all();

        return view('home.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Role $role)
    {
        $role->name = $request->input('name');
        $role->save();

        $role->permissions()->sync($request->input('permission'));

        return redirect()->route('home.roles.index')
            ->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyRequest $request, Role $role)
    {
        $role->delete();
        return redirect()->route('home.roles.index')
            ->with('success', 'Role deleted successfully');
    }
}
