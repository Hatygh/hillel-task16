<?php

require_once ('header.php');

use Illuminate\Database\Eloquent\Model;

class User extends Model {
    public function posts()
    {
        return $this->hasMany('Post');
    }
};

class Post extends Model {
    public function user()
    {
        return $this->belongsTo('User');
    }

    public function category()
    {
        return $this->belongsTo('Category');
    }

    public function tags()
    {
        return $this->belongsToMany('Tag');
    }
};

class Tag extends Model {
    public function posts()
    {
        return $this->belongsToMany('Post');
    }
};

class Category extends Model {
    public function posts()
    {
        return $this->belongsToMany('Post');
    }
};


