<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    //if table name diff from model name
    // protected $table = 'posts';

    //if primary key not id
    // protected $primaryKey = 'post_id';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
    	'title',
    	'content',
    	'name'
    ];
}
