<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    /**
     * Define table name
     * 
     * @return string
     */
    protected $table = 'role';
    
    /**
     * Define fillable field in database
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function UserRoles():HasMany
    {
        return $this->hasMany(UserRole::class, 'role_id', 'id');
    }
}
