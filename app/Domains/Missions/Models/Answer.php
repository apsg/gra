<?php
namespace App\Domains\Missions\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int          id
 * @property int          mission_id
 * @property string       text
 * @property boolean      is_correct
 * @property Carbon       updated_at
 * @property Carbon       created_at
 *
 * @property-read Mission mission
 */
class Answer extends Model
{
    protected $fillable = [
        'mission_id',
        'text',
        'is_correct',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'mission_id',
    ];

    protected $casts = [
        'is_correct' => 'boolean',
    ];

    public function mission()
    {
        return $this->belongsTo(Mission::class);
    }
}
