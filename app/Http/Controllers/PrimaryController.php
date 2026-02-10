<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Requests\registerRequest;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PrimaryController extends Controller
{

    public function index() {
        $users = User::all();
        return view('roles-permissions.index', compact('users'));
    }

    public function store_user(registerRequest $request)
    {
        $user = $request->validated();
        User::create($user);
        return redirect()->route('roles-permissions');
    }

    public function store_role(request $request) {
        $request->validate([
            'name' => 'required|string|unique:roles,name',
        ]);

        Role::firstOrCreate([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);
        return redirect()->route('roles-permissions');

    }

    public function store_permission(request $request) {
         $request->validate([
            'name' => 'required|string|unique:roles,name',
        ]);

        Permission::firstOrCreate([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);
        return redirect()->route('roles-permissions');
    }
}
