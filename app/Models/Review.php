<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Defines the mass assignable fields.
     *
     */
    protected $fillable = ['book_id', 'review', 'rating'];

    /**
     * Defines the fields' types.
     *
     */
    protected $casts = [
        'book_id' => 'integer',
        'review' => 'string',
        'rating' => 'integer',
    ];

    protected static function booted()
    {
        static::updated(fn(Review $review) => cache()->forget('book:' . $review->book_id));

        static::deleted(fn(Review $review) => cache()->forget('book:' . $review->book_id));
    }

    /**
     * Defines the relationship with Book model.
     *
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }


}
