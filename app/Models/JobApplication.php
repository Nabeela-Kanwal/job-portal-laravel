<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;
    protected $casts = [
        'applied_date' => 'datetime',
    ];


    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
