<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'id',
        'user_id',
        'user_name',
        'user_email',
        'image',
        'post_id',
        'comment',
        'created_at',
    ];

    public $timestamps = false;
}
