<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    //in your category model, you have not created a relationship with the post. So i have created a relationship that defines that a category can have many posts

    public function category(){
        return $this->hasMany(Post::class);
    }
}
