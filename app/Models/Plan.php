<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['name','url','price','description','status'];
    protected $hidden=['created_at','updated_at'];

    //un plan puede tener varios details 1:M
    public function details(){
        return $this->hasMany(DetailPlan::class);
    }

    //filtro de busqueda
    public function search ($filter = null){
        $results = $this->where('name', 'LIKE', "%{$filter}%" )
                    ->orWhere('description', 'LIKE', "%{$filter}%" ) //comillas dobles cuando hay variable dentro
                    ->paginate();

                    return $results;
    }

}
