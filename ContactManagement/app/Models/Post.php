<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment; 
use App\Models\Like;
use App\Models\Dislike;
use App\Models\View;
use App\Models\Bookmark;
use App\Models\Report;
use App\Models\Subscription; 

class Post extends Model
{
   protected $guarded=[];

   public function tags(){
    return $this->belongsToMany('App\Models\Tag');

   }
   
   public function user(){
      return $this->belongsToMany('App\Models\User');
     }
     
   public function category(){
      return $this->belongsToMany('App\Models\Category');
     }
     public function comments(){
      return $this->hasMany('App\Models\Comment');
     }
}
