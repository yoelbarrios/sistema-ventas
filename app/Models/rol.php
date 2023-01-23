<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    use HasFactory;
    protected $table = 'rols';
    protected $fillable=['nombre','descripcion'];
    public $timestamps=false;

    public function users(){
        return $this->hasMany('App\user');
    }
}
