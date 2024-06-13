<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\MorphedByMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Illuminate\Database\Eloquent\Relations\MorphOneOrMany;
use Illuminate\Database\Eloquent\Relations\MorphToManyOrMany;
use Illuminate\Database\Eloquent\Relations\MorphedByManyOrMany;
use Illuminate\Database\Eloquent\Relations\HasManyOrMany;
use Illuminate\Database\Eloquent\Relations\MorphToOrMany;
use Illuminate\Database\Eloquent\Relations\MorphOneThroughOrMany;
use Illuminate\Database\Eloquent\Relations\MorphToManyThroughOrMany;


class Post extends Model
{
   protected $guarded=[];

   public function tags(){
    return $this->belongsToMany('App\Models\Tag');

   }
   
   public function users(){
      return $this->belongsToMany('App\Models\User');
     }
     
   public function category(){
      return $this->belongsToMany('App\Models\Category');
     }
     public function comments(){
      return $this->hasMany('App\Models\Comment');
     }
}
