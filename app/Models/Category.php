<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function preferences()
    {
        return $this->hasMany(Preference::class);
    }

    public function categoryRecords()
    {
        return $this->belongsTo(CategoryRecord::class);
    }
}