<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'first_name',
        'middle_name',
        'last_name',
        'username',
        'email',
        'password',
        'display_picture',
        'last_login_at',
        'is_active',
        'is_archived',
    ];

    public function jobDetails()
    {
        return $this->hasOne(JobDetail::class);
    }

    public function ojtDetails()
    {
        return $this->hasOne(OjtDetail::class);
    }

    public function dailyAccomplishments()
    {
        return $this->hasMany(DailyAccomplishment::class);
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }
}
