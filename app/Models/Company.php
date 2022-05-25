<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table="companies";
    protected $fillable = ['name', 'address', 'avatar', 'user_id', 'in_whitelist', 'description'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function faculty() {
        return $this->belongsTo(Faculty::class);
    }
}
