<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $table = 'links';

    protected $fillable = [
        'original_url',
        'short_token',
        'transition_limit',
        'transition_count',
        'expires_at',
    ];
}
