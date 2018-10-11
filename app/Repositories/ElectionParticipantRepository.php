<?php

namespace App\Repositories;

use App\Models\ElectionParticipant;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ElectionParticipantRepository
 * @package App\Repositories\Admin
 * @version September 17, 2018, 11:13 am UTC
 *
 * @method ElectionParticipant findWithoutFail($id, $columns = ['*'])
 * @method ElectionParticipant find($id, $columns = ['*'])
 * @method ElectionParticipant first($columns = ['*'])
*/
class ElectionParticipantRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'election_id',
        'candidate_id',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ElectionParticipant::class;
    }
}
