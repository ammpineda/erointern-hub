<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyAccomplishment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'clock_in_at',
        'clock_out_at',
        'clock_in_image',
        'clock_out_image',
        'attachment_file',
        'is_approved',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

