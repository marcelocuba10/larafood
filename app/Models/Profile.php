<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Profile extends Model
{
    protected $fillable=['name','description'];

    /**
     * Get permissions
     * retorna los permisos de este perfil
     */

     public function permissions(){
        return $this->BelongsToMany(Permission::class);
     }

}
