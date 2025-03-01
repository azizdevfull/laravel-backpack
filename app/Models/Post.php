<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use CrudTrait;
    protected $fillable = ['title', 'body', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
