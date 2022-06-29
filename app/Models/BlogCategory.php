<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    /**
     * Define table name
     * 
     * @return string
     */
    protected $table = 'blog_category';
    
    /**
     * Define fillable field in database
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'is_have_detail'
    ];
}
