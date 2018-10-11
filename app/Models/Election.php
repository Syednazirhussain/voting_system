<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Election
 * @package App\Models
 * @version September 12, 2018, 8:40 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection ElectionParticipant
 * @property \Illuminate\Database\Eloquent\Collection PoliticalGroup
 * @property \Illuminate\Database\Eloquent\Collection Vote
 * @property string title
 * @property string description
 * @property string voting_start
 * @property string voting_end
 * @property string election_year
 */
class Election extends Model
{
    use SoftDeletes;

    public $table = 'election';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'description',
        'voting_start',
        'voting_end',
        'election_year',
        'election_participant_ids',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'voting_start' => 'string',
        'voting_end' => 'string',
        'election_year' => 'string',
        'election_participant_ids' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function electionParticipants()
    {
        return $this->hasMany(\App\Models\ElectionParticipant::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function politicalGroups()
    {
        return $this->hasMany(\App\Models\PoliticalGroup::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function votes()
    {
        return $this->hasMany(\App\Models\Vote::class);
    }
}
