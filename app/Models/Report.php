<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['detail', 'due_date', 'name'];
    protected $table = 'reports';

   
    public function users()
    {
        return $this->belongsToMany(User::class, 'reports_users')->withPivot('mark', 'submission_link')->withTimestamps(); ;
    }

}
