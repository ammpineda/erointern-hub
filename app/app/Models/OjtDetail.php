<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OjtDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'required_hours',
        'rendered_hours',
        'remaining_hours',
        'has_endorsement_letter',
        'has_acceptance_letter',
        'onboard_at',
        'exit_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

