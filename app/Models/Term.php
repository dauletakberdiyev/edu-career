<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'registration_end',
        'grading_start',
        'grading_end',
        'term_end',
        'active',
    ];
    protected $table="terms";
}
