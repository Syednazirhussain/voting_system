<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PoliticalGroup
 * @package App\Models\Admin
 * @version September 17, 2018, 6:43 am UTC
 *
 * @property \App\Models\Admin\Election election
 * @property \Illuminate\Database\Eloquent\Collection electionParticipants
 * @property integer election_id
 * @property string title
 * @property string description
 * @property string symbol
 * @property string founder
 * @property string year
 */
class PoliticalGroup extends Model
{
    use SoftDeletes;

    public $table = 'political_groups';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'election_id',
        'title',
        'description',
        'symbol',
        'founder',
        'year'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'election_id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'symbol' => 'string',
        'founder' => 'string',
        'year' => 'string'
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
    public function election()
    {
        return $this->belongsTo(\App\Models\Election::class);
    }
}
