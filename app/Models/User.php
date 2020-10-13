<?php

namespace App\Models;

use App\Domains\Games\Models\Game;
use App\Domains\Missions\Models\Mission;
use App\Helpers\RoleHelper;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Spatie\Permission\Traits\HasRoles;

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
 * @property-read Game[]|Collection    games
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

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

    public function games()
    {
        return $this->hasMany(Game::class);
    }

    public function isAdmin()
    {
        return $this->hasRole(RoleHelper::ADMIN);
    }
}
