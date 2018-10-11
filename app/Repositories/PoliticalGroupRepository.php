<?php

namespace App\Repositories;

use App\Models\PoliticalGroup;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PoliticalGroupRepository
 * @package App\Repositories\Admin
 * @version September 17, 2018, 6:43 am UTC
 *
 * @method PoliticalGroup findWithoutFail($id, $columns = ['*'])
 * @method PoliticalGroup find($id, $columns = ['*'])
 * @method PoliticalGroup first($columns = ['*'])
*/
class PoliticalGroupRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'election_id',
        'title',
        'description',
        'symbol',
        'founder',
        'year'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PoliticalGroup::class;
    }
}
