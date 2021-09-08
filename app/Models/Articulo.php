<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;


class Articulo extends Model
{
    use HasFactory;
    use Userstamps;
     


    protected $fillable = ['idcategoria','idsector','idsede','nombre','modelo','serial','descripcion'];

   /* public $incrementing = false;*/

    public function categoria(){
        return $this -> belongsTo('App\Models\Categoria'); 
    }
    public function sector(){
        return $this -> belongsTo('App\Models\Sector'); 
    }

    public function sede(){
        return $this -> belongsTo('App\Models\Sede'); 
    }

    public function marca(){
        return $this -> belongsTo('App\Models\Marca'); 
    }
    
    

    public function user(){
        return $this -> belongsTo('App\Models\User'); 
    }

}