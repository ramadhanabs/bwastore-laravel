<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','users_id','categories_id','price','description', 'slug'
    ];

    protected $hidden = [];

    //relation
    public function galleries(){
        return $this->hasMany(ProductsGallery::class,'products_id','id');
    }

    public function user(){
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function categories(){
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
}
