<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Blog extends Model
{
    use HasFactory;

    /**
     * Define table name
     * 
     * @return string
     */
    protected $table = 'blog';
    
    /**
     * Define fillable field in database
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'author',
        'status',
        'category_id',
        'detail_category_id',
        'is_post'
    ];

    public function category():BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'category_id', 'id');
    }

    public function detailCategory():BelongsTo
    {
        return $this->belongsTo(BlogDetailCategory::class, 'detail_category_id', 'id');
    }

    public function image():HasOne
    {
        return $this->hasOne(BlogImage::class, 'blog_id', 'id');
    }
}
