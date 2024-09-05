<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article_Request extends Model
{
    use HasFactory;
    protected $fillable = [
        'article_id',
        'user_id',
        'request_type',
        'request_status',
        'comments',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}