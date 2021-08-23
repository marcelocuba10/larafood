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

    public function profiles($idPermission)
    {
        $permission = $this->permission->find($idPermission);

        if (!$permission) {
            return redirect()->back();
        }

        $profiles = $permission->profiles()->paginate();  //trae todos permisos vinculado al perfil seleccionado

        return view('admin.pages.permissions.profiles.index', compact('permission', 'profiles'));
    }

    public function permissionsAvailable(Request $request , $idProfile)
    {

        if (!$profile = $this->profile->find($idProfile)) {
            return redirect()->back();
        }

        //filtro de busqueda
        //enviamos todo excepto el token
        $filters = $request->except('_token');
        $permissions = $profile->permissionsAvailable($request->filter);

        //$permissions = $this->permission->all(); //trae todos permisos
        //$permissions = $profile->permissionsAvailable(); //trae los permisos menos los que ya estan vinculados

        return view('admin.pages.profiles.permissions.available', compact('profile', 'permissions', 'filters'));
    }

    public function profilesAvailable(Request $request , $idPermission)
    {

        if (!$permission = $this->permission->find($idPermission)) {
            return redirect()->back();
        }

        //filtro de busqueda
        //enviamos todo excepto el token
       $filters = $request->except('_token');
       $profiles = $permission->profilesAvailable($request->filter);

        //$profiles = $this->profile->all(); //trae todos perfiles
        //$permissions = $profile->permissionsAvailable(); //trae los permisos menos los que ya estan vinculados

        return view('admin.pages.permissions.profiles.available', compact('permission', 'profiles','filters'));
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

    public function attachProfilesPermission(Request $request, $idPermission)
    {

        if (!$permission = $this->permission->find($idPermission)) {
            return redirect()->back();
        }

        //verificamos si marco algun permiso
        if (!$request->profiles || count($request->profiles) == 0) {
            return redirect()
                ->back()
                ->with('message', 'Se requiere por lo menos un permiso.');
        }

        //vinculamos los perfiles al permiso
        $permission->profiles()->attach($request->profiles); //profiles es una funcion en el model permission //attach es un metodo de vincular en laravel

        return redirect()->route('permissions.profiles', $permission->id);
    }

    public function detachPermissionsProfile($idProfile, $idPermission){

        $profile = $this->profile->find($idProfile);
        $permission = $this->permission->find($idPermission);

        if (!$profile || !$permission) {
            return redirect()->back();
        }

        $profile->permissions()->detach($permission->id); //detach is a function default laravel

        return redirect()->route('profiles.permissions', $profile->id);

    }

    public function detachProfilesPermission($idProfile, $idPermission){

        $profile = $this->profile->find($idProfile);
        $permission = $this->permission->find($idPermission);

        if (!$profile || !$permission) {
            return redirect()->back();
        }

        $permission->profiles()->detach($profile->id); //detach is a function default laravel

        return redirect()->route('permissions.profiles', $permission->id);

    }

}
