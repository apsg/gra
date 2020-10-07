<?php

namespace App\Models;

use App\Domains\Missions\Models\Mission;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;

/**
 * @property int                       id
 * @property string                    name
 * @property string                    email
 * @property string                    password
 * @property string                    remember_token
 * @property Carbon                    created_at
 * @property Carbon                    updated_at
 *
 * @property-read Mission[]|Collection missions
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function missions()
    {
        return $this->hasMany(Mission::class);
    }
}
