<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diarypost extends Model
{
    protected $table = 'diary_post';
    protected $fillable = ['title','content', 'user_id', 'image'];
}
