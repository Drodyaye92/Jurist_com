<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    protected $fillable = [
        'user_id','message_id','answers',
    ];
}
