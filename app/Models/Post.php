<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    const BOORADOR =1;
    const PUBLICADO=2;

    //Relacion Uno a Muchos (Inversa) con Category
    public function category(){
        return $this->belongsTo(Category::class);
    }

     //Relacion Uno a Muchos (Inversa) con User
     public function user(){
        return $this->belongsTo(User::class);
    }

    //Relacion Muchos a Muchos
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    //Relacion Uno a Muchos polimorfica
    public function images(){
        return $this->morphMany(Image::class,'imageable');
    }
}
