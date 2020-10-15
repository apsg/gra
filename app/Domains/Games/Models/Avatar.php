<?php
namespace App\Domains\Games\Models;

use App\Models\Traits\HasImage;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int            id
 * @property string         image
 * @property int|null       user_id
 * @property Carbon         created_at
 * @property Carbon         updated_at
 *
 * @property-read User|null user
 */
class Avatar extends Model
{
    use HasImage;

    protected $fillable = [
        'image',
        'user_id',
    ];

    protected $hidden = [
        'user_id',
        'updated_at',
    ];

    protected $appends = [
        'image_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeGlobal($query)
    {
        return $query->whereNull('user_id');
    }

    public function scopeForUser($query, User $user)
    {
        return $query->where(function ($q) use ($user) {
            $q->whereNull('user_id')
                ->orWhere('user_id', $user->id);
        });
    }
}
