<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UrlShortener extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
        'code',
        'clicks',
        "original_url",
        "shortened_url",
        "user_id"
    ];

    public function module(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
