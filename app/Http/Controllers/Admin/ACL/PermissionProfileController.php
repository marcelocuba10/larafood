<?php

namespace App\Http\Controllers\Admin\ACL;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Profile;

class PermissionProfileController extends Controller
{
    //obtengo objeto de los models
    protected $profile, $permission;

    public function __construct(Profile $profile, Permission $permission)
    {
        $this->profile = $profile;
        $this->permission = $permission;
    }

    public function permissions($idProfile)
    {
        $profile = $this->profile->find($idProfile);

        if (!$profile) {
            return redirect()->back();
        }

        $permissions = $profile->permissions()->paginate();

        return view('admin.pages.profiles.permissions.permissions', compact('profile', 'permissions'));
    }

    public function permissionsAvailable($idProfile)
    {

        if (!$profile = $this->profile->find($idProfile)) {
            return redirect()->back();
        }

        //$permissions = $this->permission->all(); 
        $permissions = $this->permission->paginate();

        return view('admin.pages.profiles.permissions.available', compact('profile', 'permissions'));
    }

    public function attachPermissionsProfile(Request $request, $idProfile)
    {

        if (!$profile = $this->profile->find($idProfile)) {
            return redirect()->back();
        }

        if (!$request->permissions || count($request->permissions) == 0) {
            return redirect()
                ->back()
                ->with('message', 'Se requiere por lo menos un permiso.');
        }

        $profile->permissions()->attach($request->permissions); //vincula permisos en el perfil. //permissions es una funcion en el model profile //attach es un metodo de laravel

        return redirect()->route('profiles.permissions', $profile->id);
    }
}
