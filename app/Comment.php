<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id', 'page_id', 'comment',
    ];
    public function user(){
        return $this->belongsTo('\TCG\Voyager\Models\User');
    }
    public function page(){
        return $this->belongsTo('TCG\Voyager\Models\Post');
    }
}
