<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Sector extends Model
{
    use HasFactory;
    use Userstamps;

    protected $fillable = ['nombre','descripcion','condicion'];

    public function articulo(){
        return $this -> hasMany('App\Models\Set_Articulo'); 
    }
}
