<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Videos extends Model
{
    use SoftDeletes;

    public function usersWhoLiked()
    {
        return $this->belongsToMany(User::class, 'likes');
    }

    // associate a video with a series if it belongs to one
    public function videoSeries(){
        return $this->belongsTo(VideoSeries::class, 'id');
    }

    // access to the actual video files
    public function videoFile(){
        return $this->hasMany(VideoFile::class, 'video_id');
    }

    public function category(){
        return $this->belongsTo(categories::class);
    }

    public function genre(){
        return $this->belongsTo(Genre::class, 'id');
    }

    public function rating(){
        return $this->belongsTo(rating::class);
    }

    public function parentControl(){
        return $this->belongsTo(ParentControl::class);
    }


}
