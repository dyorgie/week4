<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;

    protected $fillable = [
        'comment_content',
        'comment_date',
        'reviewer_name',
        'reviewer_email',
        'is_hidden',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
