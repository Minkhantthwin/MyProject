<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function scopeFilter($query, $filter)
    {
        
        $query->when($filter['search']??false, function($query, $search){
            $query->where(function ($query) use($search) { //Logical Grouping
              $query->where('title','LIKE','%'.$search.'%')
                    ->orwhere('body','LIKE','%'.$search.'%');
            });
            
        });
        $query->when($filter['category']??false, function($query, $slug){
               $query->whereHas('category', function($query) use ($slug)
               {
                  $query->where('slug', $slug);
               });
            });

            $query->when($filter['username']??false, function($query, $username){
                $query->whereHas('author', function($query) use ($username)
                {
                   $query->where('username', $username);
                });
             });        
            
    }

    

    protected $with =['category','author'];

    public function category(){
        
        return $this->belongsTo(Category::class);
    }

    public function author(){
        
        return $this->belongsTo(User::class,'user_id');
    }

    public function comments()
    {
       return $this->hasMany(Comment::class);    
    }

    public function subscribers()
    {
        return $this->belongsToMany(User::class);
    }

    public function unSubscribed()
    {
       $this->subscribers()->detach(auth()->id());
    }

    public function subscribed()
    {
      $this->subscribers()->attach(auth()->id());
    }
}


