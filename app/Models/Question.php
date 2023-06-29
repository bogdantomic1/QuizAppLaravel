<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'answer1',
        'answer2',
        'correct_answer'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
