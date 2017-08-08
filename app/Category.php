<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    public function getChilds(){
        return $this->hasMany('App\Category', 'parent_id', 'id');
    }

    public function parent(){
        return $this->belongsTo('App\Category','parent_id', 'id');
    }

    public static function  tree(){
        $cats = Category::all();
        $categories = array();
        foreach ($cats as $k=>$cat) {
            if($cat->parent_id == 0) {
                $categories[$cat->id] = $cat;
                $categories[$cat->id]->childs = array();
                unset($cats[$k]);
            }
        }

        foreach ( $cats as $cat ) {
            $categories[$cat->parent_id]->childs = array_merge($categories[$cat->parent_id]->childs, array($cat));
        }


        return $categories;
    }


}
