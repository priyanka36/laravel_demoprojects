<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function whisky() {
        return $this->hasMany('App\Whisky');
    }
    public function vodka() {
        return $this->hasMany('App\Vodka');
    }
    public function rum() {
        return $this->hasMany('App\Rum');
    }
    public function gin() {
        return $this->hasMany('App\Gin');
    }
}
