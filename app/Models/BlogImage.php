<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogImage extends Model
{
    use HasFactory;

    /**
     * Define table name
     * 
     * @return string
     */
    protected $table = 'blog_image';
    
    /**
     * Define fillable field in database
     *
     * @var array
     */
    protected $fillable = [
        'path',
        'blog_id'
    ];
}
