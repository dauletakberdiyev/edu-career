<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'quota', 'company_id'];
    protected $table = 'vacancy';

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function applicants() {
        return $this->belongsToMany(User::class, 'user_vacancy', 'vacancy_id', 'user_id')->withPivot('status');
    }

    public function faculty() {
        return $this->belongsTo(Faculty::class);
    }
}
