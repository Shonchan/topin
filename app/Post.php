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

        $query = $this->where('published', '=', 1)
            ->where('category_id','=', $this->category_id)
            ->where('id','!=', $this->id)
            ->orderBy('id', 'asc')->limit(2);
        $next = $this->where('id', '>', $this->id)
            ->where('published', '=', 1)
            ->where('category_id','=', $this->category_id)
            ->where('id','!=', $this->id)
            ->orderBy('id', 'asc')
            ->limit(2)
            ->union($query)->limit(2)->get();
        return $next;
    }

    public function prev()
    {
        $query = $this->where('published', '=', 1)
            ->where('category_id','=', $this->category_id)
            ->where('id','!=', $this->id)->orderBy('id', 'desc')->limit(2);
        $prev = $this->where('id', '<', $this->id)
            ->where('published', '=', 1)
            ->where('category_id','=', $this->category_id)
            ->where('id','!=', $this->id)
            ->orderBy('id', 'desc')
            ->limit(2)
            ->union($query)->limit(2)->get();

        return $prev;
    }

    public function roundLinks()
    {

        $prev = $this->prev();
        $next = $this->next();

        $links = array();
        foreach ($prev as $item){
            if(!array_key_exists($item->id, $links))
                $links[$item->id] = $item;
        }
        foreach ($next as $item){
            if(!array_key_exists($item->id, $links))
                $links[$item->id] = $item;
        }


        return view('layouts.roundLinks', compact('links'));
    }

}
