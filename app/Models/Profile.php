<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Profile extends Model
{
   protected $fillable = ['name', 'description'];

   /**
    * Get permissions
    * retorna los permisos de este perfil
    */

   public function permissions()
   {
      return $this->BelongsToMany(Permission::class);
   }

   /**
    * Permission not linked with this profile
    */

   public function permissionsAvailable($filter = null)
   {
      $permissions = Permission::whereNotIn('id', function ($query) {
         $query->select('permission_profile.permission_id');
         $query->from('permission_profile');
         $query->whereRaw("permission_profile.profile_id={$this->id}"); //O whereRaw permite passar funções nativas do próprio SQL, como sum min max e coisas parecidas.
      })
         ->where(function ($queryFilter) use ($filter) {
            if ($filter) {
               $queryFilter->where('permissions.name', 'LIKE', "%{$filter}%");
            }
         })
         ->paginate();

      return $permissions;
   }
}
