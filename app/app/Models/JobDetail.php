<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'department',
        'job_title',
        'supervisor',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
