<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'slug',
        'featured',
        'category_id',
        'content',
    ];

    /**
     * Accessors
     *
     */
    public function getFeaturedAttribute($featured)
    {
        return asset($featured);
    }

    /**
     * Soft Deletes
     *
     */
    protected $dates = [
        'deleted_at'
    ];

    /**
     * Relationships
     *
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
