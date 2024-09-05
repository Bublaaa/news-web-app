<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article_Version extends Model
{
    use HasFactory;
    protected $fillable = [
        'article_id',
        'title',
        'content',
        'version_number',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}