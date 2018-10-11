<?php

namespace App\Repositories;

use App\Models\Participant;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ParticipantRepository
 * @package App\Repositories\Admin
 * @version September 12, 2018, 10:12 am UTC
 *
 * @method Participant findWithoutFail($id, $columns = ['*'])
 * @method Participant find($id, $columns = ['*'])
 * @method Participant first($columns = ['*'])
*/
class ParticipantRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'age',
        'mobile_no',
        'email',
        'password',
        'ssn',
        'political_group_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Participant::class;
    }
}
