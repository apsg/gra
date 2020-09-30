<?php
namespace App\Domains\Missions\Models;

use App\Domains\Missions\Scopes\MissionScopes;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
