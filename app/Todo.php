<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public $fillable = ['task', 'category', 'description', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
