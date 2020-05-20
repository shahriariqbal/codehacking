<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
     
        'category_id',
        'photo_id',
        'title',
        'body'

    ];
}
