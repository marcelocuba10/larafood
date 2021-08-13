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

}
