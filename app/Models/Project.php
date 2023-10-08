<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        "language" => "array",
        "release" => "date"
    ];

    protected $fillable = [
        "title",
        "language",
        "link",
        "description",
        "thumb",
        "release",
        "slug"
    ];
}
