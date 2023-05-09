<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';
    // protected $guarded = [];
    // public $timestaps = false;
    protected $fillable = ['name', 'price', 'desc', 'status',];
}
