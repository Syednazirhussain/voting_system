<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Participant
 * @package App\Models\Admin
 * @version September 12, 2018, 10:12 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection ElectionParticipant
 * @property \Illuminate\Database\Eloquent\Collection Vote
 * @property string name
 * @property string age
 * @property string mobile_no
 * @property string email
 * @property string password
 * @property string ssn
 */
class Participant extends Model
{
    use SoftDeletes;

    public $table = 'participants';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    //timestamps = false;

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'age',
        'mobile_no',
        'email',
        'password',
        'ssn',
        'political_group_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'age' => 'string',
        'mobile_no' => 'string',
        'email' => 'string',
        'password' => 'string',
        'ssn' => 'string',
        'political_group_id'
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
    public function votes()
    {
        return $this->hasMany(\App\Models\Vote::class);
    }
}
