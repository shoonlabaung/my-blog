<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class Post extends Model
{
    
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = [
        'title',
        'category_id',
        'image',
        'user_id',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
