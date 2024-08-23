<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'body'];

    public function scopeFilter($query, $filter)
    {
        if (isset($filter['search']) && $filter['search']) {
            $query
                ->where(function($query) use($filter) {
                    $query->where('title', 'LIKE', '%' . $filter['search'] . '%')
                    ->orWhere('body', 'LIKE', '%' . $filter['search'] . '%');
                });
        }
        
        //multiple filter
        if(isset($filter['category_id']) && $filter['category_id']){
            $query->whereHas('category', function($query) use($filter) {
                $query->where('id',$filter['category_id']);
            });
        }

        if(isset($filter['user_id']) && $filter['user_id']){
            $query->whereHas('user', function($query) use($filter) {
                $query->where('id',$filter['user_id']);
            });
        }
    }

    //blog belogs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //a blog belongsto a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //a blog hasmany comments
    public function comments() 
    {
        return $this->hasMany(Comment::class);
    }

    //a blog belongsmany users
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
