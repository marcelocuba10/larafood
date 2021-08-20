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

        $permissions = $profile->permissions()->paginate();  //trae todos permisos vinculado al perfil seleccionado

        return view('admin.pages.profiles.permissions.index', compact('profile', 'permissions'));
    }

    public function permissionsAvailable($idProfile)
    {

        if (!$profile = $this->profile->find($idProfile)) {
            return redirect()->back();
        }

        //$permissions = $this->permission->all(); //trae todos permisos
        $permissions = $profile->permissionsAvailable(); //trae los permisos menos los que ya estan vinculados

        return view('admin.pages.profiles.permissions.available', compact('profile', 'permissions'));
    }

    public function attachPermissionsProfile(Request $request, $idProfile)
    {

        if (!$profile = $this->profile->find($idProfile)) {
            return redirect()->back();
        }

        //verificamos si marco algun permiso
        if (!$request->permissions || count($request->permissions) == 0) {
            return redirect()
                ->back()
                ->with('message', 'Se requiere por lo menos un permiso.');
        }

        //vinculamos los permisos al perfil
        $profile->permissions()->attach($request->permissions); //permissions es una funcion en el model profile //attach es un metodo de vincular en laravel

        return redirect()->route('profiles.permissions', $profile->id);
    }
}
