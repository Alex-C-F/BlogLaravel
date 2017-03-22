<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //indica que a chave categoria_id pertence a categoria
    public function categoria()
    {
    	return $this->belongsTo('App\Categoria');
    }
    public function tags(){
    	return $this->belongsToMany('App\Tag');
    }

}
