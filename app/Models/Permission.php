<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model
{
    protected $fillable = ['name','description'];

    /**
     * Get profiles
     * retorna los permisos de este perfil
     */

     public function profiles(){
        return $this->BelongsToMany(Profile::class);
    }
    

    /**
    * profiles not linked with this permission
    */

   public function profilesAvailable($filter = null)
   {
      $profiles = Profile::whereNotIn('id', function ($query) {
         $query->select('permission_profile.profile_id');
         $query->from('permission_profile');
         $query->whereRaw("permission_profile.permission_id={$this->id}"); //O whereRaw permite passar funções nativas do próprio SQL, como sum min max e coisas parecidas.
      })
         ->where(function ($queryFilter) use ($filter) {
            if ($filter) {
               $queryFilter->where('profiles.name', 'LIKE', "%{$filter}%");
            }
         })
         ->paginate();

      return $profiles;
   }

}
