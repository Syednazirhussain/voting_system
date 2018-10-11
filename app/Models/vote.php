<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class vote
 * @package App\Models\Vote
 * @version September 22, 2018, 6:11 am UTC
 *
 * @property \App\Models\Vote\Participant participant
 * @property \App\Models\Vote\Election election
 * @property \App\Models\Vote\User user
 * @property integer voter_id
 * @property integer candidate_id
 * @property integer election_id
 */
class vote extends Model
{
    use SoftDeletes;

    public $table = 'vote';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'voter_id',
        'participant_id',
        'election_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'voter_id' => 'integer',
        'participant_id' => 'integer',
        'election_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function participant()
    {
        return $this->belongsTo(\App\Models\Vote\Participant::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function election()
    {
        return $this->belongsTo(\App\Models\Vote\Election::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\Vote\User::class);
    }
}
