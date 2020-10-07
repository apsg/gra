<?php
namespace App\Domains\Missions\Models;

use App\Domains\Games\Models\Game;
use App\Domains\Missions\Scopes\MissionScopes;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @property int            id
 * @property string         image
 * @property string         slug
 * @property string         title
 * @property int|null       user_id
 * @property Carbon         created_at
 * @property Carbon         updated_at
 *
 * @property-read User|null user
 * @property-read Answer[]  answers
 */
class Mission extends Model
{
    use MissionScopes;

    protected $fillable = [
        'image',
        'slug',
        'user_id',
        'title',
    ];

    protected $with = [
        'answers',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function games()
    {
        return $this->belongsToMany(Game::class);
    }

    public function getImageAttribute()
    {
        return asset($this->attributes['image']);
    }

    public function imageUrl() : string
    {
        return Str::replaceFirst('public', 'storage', $this->image);
    }
}
