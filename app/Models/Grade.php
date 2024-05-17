<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $table = 'grades';
    protected $fillable = [
        'user_id', 'report', 'supervisor', 'final', 'supervisor_mark', 'weekly_report', 'internship_plan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
