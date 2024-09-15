<?php

namespace App\Models;

use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Defines the mass assignable fields.
     *
     */
    protected $fillable = ['title', 'author'];

    /**
     * Defines the fields' types.
     *
     */
    protected $casts = [
        'title' => 'string',
        'author' => 'string',
    ];

    /**
     * Defines the relationship with Review model.
     *
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
