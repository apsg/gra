<?php
namespace App\Domains\Games\Models;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int       id
 * @property string    token
 * @property int       user_id
 * @property int       game_id
 * @property Carbon    expires_at
 * @property Carbon    created_at
 * @property Carbon    updated_at
 *
 * @property-read User user
 * @property-read Game game
 */
class RemoteToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'token',
        'user_id',
        'game_id',
        'expires_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function isValid()
    {
        if ($this->expires_at === null) {
            return true;
        }

        return $this->expires_at->isFuture();
    }
}
