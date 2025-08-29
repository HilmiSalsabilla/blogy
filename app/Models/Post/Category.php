<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at',
    ];

    public $timestamps = false;

    // Relasi ke Post
    // public function posts() {
    //     return $this->hasMany(PostModel::class, 'category_id');
    // }
}
