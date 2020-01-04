<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;

class Post extends Model
{
    protected $fillable = ['title', 'content','user_id'];

    public function getCreatedAtAttribute($date)
    {
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
