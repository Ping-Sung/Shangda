<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User as UserEloquent;
use URL;
use DateTimeInterface;


class Announcement extends Model
{
    protected $fillable = [
        'last_update_user_id', 'title', 'content', 'cover_image'
    ];

    public function user(){
        return $this->belongsTo(UserEloquent::class, 'last_update_user_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y.m.d');
    }

    public function showDate()
    {
        return $this->created_at->isoFormat('YYYY-MM-DD');
    }

    public function showTitle(){
        $maxString = 12;
        if(mb_strlen($this->title) >= $maxString){
            return mb_substr($this->title, 0, $maxString) . '...';
        }else{
            return $this->title;
        }
    }

    public function showCoverImage(){
        if(empty($this->cover_image)){
            return URL::asset('images/announcements/cover_images/default.jpg');
        }else{
            return URL::asset($this->cover_image);
        }
    }
}