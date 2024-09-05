<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_Record extends Model
{
    use HasFactory;
    protected $fillable = [
        'article_id',
        'category_id',
    ];

    public function article()
    {
        return $this->hasMany(Article::class);
    }

    public function category()
    {
        return $this->hasMany(Category::class);
    }
}