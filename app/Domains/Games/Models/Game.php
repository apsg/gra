<?php
namespace App\Domains\Games\Models;

use App\Domains\Missions\Models\Mission;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * @property  int                      id
 * @property string                    title
 * @property int|null                  user_id
 * @property Carbon                    created_at
 * @property Carbon                    updated_at
 *
 * @property-read User                 user
 * @property-read Mission[]|Collection missions
 */
class Game extends Model
{
    protected $fillable = [
        'title',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function missions()
    {
        return $this->belongsToMany(Mission::class)
            ->withPivot('order')
            ->orderBy('order');
    }

    public function getAvatars()
    {
        return [
            [
                'name' => 'Mario',
                'url'  => asset('images/mario-8-bit.gif'),
            ],
            [
                'name' => 'Mushroom',
                'url'  => asset('images/mushroom.png'),
            ],
            [
                'name' => 'Cat',
                'url'  => asset('images/cat.png'),
            ],
        ];
    }
}
