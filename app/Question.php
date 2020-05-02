<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Question extends Model
{
    //
    protected $fillable=['title','body'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title']=$value;
        $this->attributes['slug']=str_replace(' ','-',$value);
    }

    public function getUrlAttribute()
    {
        return route('questions.show',$this->id);
    }
    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

}
