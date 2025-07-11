<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    /** @use HasFactory<\Database\Factories\MediaFactory> */
    use HasFactory;

    protected $fillable = [
        'file_name',
        'file_type',
        'file_size',
        'url',
        'upload_date',
        'description',
        'post_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
