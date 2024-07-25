<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'thumbnail',
        'banner',
        'description',
        'newstype',
        'user_id',
        'viewer'

    ];
}
