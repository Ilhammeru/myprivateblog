<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogDetailCategory extends Model
{
    use HasFactory;

    /**
     * Define table name
     * 
     * @return string
     */
    protected $table = 'blog_detail_category';
    
    /**
     * Define fillable field in database
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'blog_category_id'
    ];
}
