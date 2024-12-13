<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistical extends Model
{
    protected $fillable = ['date', 'data'];
    public $timestamps = false;
}
