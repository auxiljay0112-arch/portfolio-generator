<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = ['slug', 'name', 'title', 'bio', 'email', 'skills'];
}
