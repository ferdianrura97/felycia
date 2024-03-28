<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function menu(){
    	return $this->belongsToMany(Menu::class, 'level_menus');
    }

    public function user(){
        return $this->hasMany(User::class);
	}
    
}
