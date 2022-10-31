<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug',
        'category_id',
        'cover'
    ];

    public function category() {
        return $this->belongsTo('App\Category');
        //return $this->belongsTo('App\Category','category_id','id')
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }  
    
    public function getCoverPathAttribute() {
        return $this->cover ? Storage::disk('public')->url($this->cover) : null;
    }

    public function getDateAttribute() {
        return $this->created_at->format('d/m/Y');
    }

    protected $appends = ['cover_path','date'];
}
