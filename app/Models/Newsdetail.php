<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsdetail extends Model
{
    use HasFactory;
    protected $fillable = ['trendnews','photo', 'newshead','newsstart','description','status'];
}
