<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyPhoto extends Model
{
    protected $fillable = ['photo_path'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
