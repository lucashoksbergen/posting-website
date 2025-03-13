<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['title', 'content'];
}

?>