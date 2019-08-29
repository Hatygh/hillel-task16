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
        return $this->hasMany('Post');
    }
};



//$userposts = User::find(1)->posts()->get();
//echo 'posts from user1';
//foreach ($userposts as $userpost) {
//    echo $userpost->text;
//}

//$user = Post::find(1)->user()->get();
//var_dump($user->first()->username);

//$user = Post::find(1)->category()->get();
//var_dump($user->first()->category);

//$user = Post::find(1)->tags()->get();
//foreach ($user as $tag) {
//    echo $tag->tag . ' ';
//}

//$user = Tag::find(1)->posts()->get();
//foreach ($user as $tag) {
//    echo $tag->text . ' ';
//}

//$user = Category::find(1)->posts()->get();
//foreach ($user as $tag) {
//    echo $tag->text . ' ';
//}


