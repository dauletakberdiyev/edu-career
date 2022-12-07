<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasRoles;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'firstname',
        'lastname',
        'avatar',
        'faculty_id',
        'gender',
        'email',
        'password',
        'cv',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function reports()
    {
        return $this->belongsToMany(Report::class, 'reports_users')->withPivot('mark', 'submission_link')->withTimestamps();
    }

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class);
    }

    public function applies()
    {
        return $this->belongsToMany(Vacancy::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function registration()
    {
        return $this->hasOne(Registration::class);
    }

    public function grade()
    {
        return $this->hasOne(Grade::class);
    }

    public function reportsGrade()
    {
        $reports = $this->reports()->get();
        $grade = 0;

        foreach ($reports as $report) {
            $grade += $report->pivot->mark;
        }

        return $grade * 0.01;
    }

    public function feedback()
    {
        return $this->hasOne(Feedback::class);
    }
}
