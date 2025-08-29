<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'id',
        'title',
        'image',
        'description',
        'category',
        'user_id',
        'user_name',
    ];

    public $timestamps = false;
}
