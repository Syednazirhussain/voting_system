<?php

namespace App\Repositories;

use App\Models\Election;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ElectionRepository
 * @package App\Repositories
 * @version September 12, 2018, 8:40 am UTC
 *
 * @method Election findWithoutFail($id, $columns = ['*'])
 * @method Election find($id, $columns = ['*'])
 * @method Election first($columns = ['*'])
*/
class ElectionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'voting_start',
        'voting_end',
        'election_year',
        'election_participant_ids',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Election::class;
    }
}
