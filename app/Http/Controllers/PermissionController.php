<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Role $role)
    {
        $permissions = Permission::query()->get();

        return view('role.permission.index', [
            'role' => $role,
            'permissions' => $permissions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Role $role)
    {
        $permissions = collect($request->permissions);
        
        $permissionName = $permissions->filter(fn($permission) => $permission === 'on')->keys();

        $role->syncPermissions($permissionName);

        return redirect()->route('roles.permissions.index', $role);
    }

}