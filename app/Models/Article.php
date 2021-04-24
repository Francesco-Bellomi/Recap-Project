<?php

namespace App\Models;

use App\Models\User;
use App\Models\Color;
use App\Models\Element;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'img',
        'price',
        'description',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class); 

    }

    public function categories(){

        return $this->belongsToMany(Category::class);

    }

    public function colors(){

        return $this->belongsToMany(Color::class);

    }

    public function elements(){

        return $this->belongsToMany(Element::class);
        
    }

}
