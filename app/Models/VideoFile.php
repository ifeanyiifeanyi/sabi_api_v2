<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoFile extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function video()
    {
        return $this->belongsTo(Videos::class, 'id');
    }
}
