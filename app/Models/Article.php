<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'status',
        'image_url',
        'views_count',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function articleRequests()
    {
        return $this->hasMany(ArticleRequest::class);
    }

    public function articleVersions()
    {
        return $this->hasMany(ArticleVersion::class);
    }

    public function categoryRecords()
    {
        return $this->belongsTo(CategoryRecord::class);
    }
}