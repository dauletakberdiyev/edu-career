<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $table = 'registrations';
    protected $fillable = [
        'user_id',
        'vacancy_id',
        'agreement',
        'reason',
        'type',
        'status',
        'term_id',
        'company_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
