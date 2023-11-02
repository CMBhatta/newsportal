<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['category_name', 'slug', 'status'];
    public function newsDetail()
{
    return $this->hasMany(Newsdetail::class);
}
public function video()
{
    return $this->hasMany(Video::class);
}
}
