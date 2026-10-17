<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['portfolio_id', 'title', 'description', 'link', 'tech'];
}