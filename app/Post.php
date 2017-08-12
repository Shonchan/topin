<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'meta_title', 'meta_keywords', 'meta_description', 'image', 'published'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function getAuthor()
    {
        return $this->belongsTo('App\User', 'author', 'id');
    }

    public function setUpdatedAtAttribute($value)
    {

        // to Disable updated_at
    }



    public function next()
    {

        $query = $this->where('published', '=', 1)->orderBy('id', 'asc')->limit(2);
        $next = $this->where('id', '>', $this->id)
            ->where('published', '=', 1)
            ->orderBy('id', 'asc')
            ->limit(2)
            ->union($query)->limit(2)->get();
        return $next;
    }

    public function prev()
    {
        $query = $this->where('published', '=', 1)->orderBy('id', 'desc')->limit(2);
        $prev = $this->where('id', '<', $this->id)
            ->where('published', '=', 1)
            ->orderBy('id', 'desc')
            ->limit(2)
            ->union($query)->limit(2)->get();
        return $prev;
    }

    public function roundLinks()
    {
        $prev = $this->prev();
        $next = $this->next();

        return view('layouts.roundLinks', compact('prev', 'next'));
    }

}
