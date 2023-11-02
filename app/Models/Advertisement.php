<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'position_id',
        'description',
        'url',
        'start_date',
        'end_date',
        'status',
    ];
    public function position(){
        return $this->belongsTo(Position::class);
    }
}
