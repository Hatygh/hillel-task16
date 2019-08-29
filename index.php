<?php

require_once ('header.php');

use Illuminate\Database\Eloquent\Model;

class User extends Model {
    public function posts()
    {
        // select * from posts where user_id = ?
        return $this->hasMany('Post');
    }
};

class Post extends Model {
    public function user()
    {
        // select * from user where post_id = ? limit 1
        return $this->belongsTo('User');
    }

    public function category()
    {
        // select * from category where post_id = ? limit 1
        return $this->belongsTo('Category');
    }

    public function tags()
    {
        // select * tags
        // join post_tag on tags.id = post_tag.tag_id
        // where post_id = ?
        return $this->belongsToMany('Tag');
    }
};

class Tag extends Model {
    public function posts()
    {
        // select * posts
        // join post_tag on posts.id = post_tag.post_id
        // where tag_id = ?
        return $this->belongsToMany('Post');
    }
};

class Category extends Model {
    public function posts()
    {
        // select * from posts where category_id = ?
        return $this->hasMany('Post');
    }
};



