<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class SetArticulo extends Model
{
    use HasFactory;
    use Userstamps;

    //Relacion muchos a muchos

   public function set_articulos(){
        return $this -> belongsToMany('App\Models\Articulo');
}
}
