<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        "foreignKey_user_id",
        "foreignKey_product_id",
        "comment",
    ];

    protected $hidden = [];

    public function user ()
    {
        return $this->belongsTo(User::class,'foreignKey_user_id','id');
    }
}
