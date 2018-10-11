<?php

namespace App\Repositories;

use App\Models\vote;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class voteRepository
 * @package App\Repositories\Vote
 * @version September 22, 2018, 6:11 am UTC
 *
 * @method vote findWithoutFail($id, $columns = ['*'])
 * @method vote find($id, $columns = ['*'])
 * @method vote first($columns = ['*'])
*/
class voteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'voter_id',
        'candidate_id',
        'election_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return vote::class;
    }
}
