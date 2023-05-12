<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

        public function articles()
        {
        return $this->hasMany(Article::class);
        }
        public function parent()
        {
        return $this->belongsTo(Category::class, 'parent_id');
        }
        public function subcategories()
        {
        return $this->hasMany(Category::class, 'parent_id');
        }
}
