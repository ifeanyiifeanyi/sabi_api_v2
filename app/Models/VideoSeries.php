<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoSeries extends Model
{
    use HasFactory;

    protected $guarded = [];

    // setup relations between series and videos and belongs to them
    public function videos(){
        return $this->hasMany(Videos::class, 'series_id');
    }
}
