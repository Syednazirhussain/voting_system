<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreatePoliticalGroupRequest;
use App\Http\Requests\Admin\UpdatePoliticalGroupRequest;
use App\Repositories\PoliticalGroupRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\PoliticalGroup;
use App\Models\Election;

use DB;

class PoliticalGroupController extends Controller
{
    /** @var  PoliticalGroupRepository */
    private $politicalGroupRepository;

    public function __construct(PoliticalGroupRepository $politicalGroupRepo)
    {
        $this->politicalGroupRepository = $politicalGroupRepo;
    }

    /**
     * Display a listing of the PoliticalGroup.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->politicalGroupRepository->pushCriteria(new RequestCriteria($request));
        $politicalGroups = $this->politicalGroupRepository->all();

        // $elections = DB::table( 'political_groups' )
        //              ->join( 'election', 'political_groups.election_id', '=', 'election.id' )
        //              ->get();

        //dd($politicalGroups);

        $elections = election::all();
        //->with('politicalGroups', $politicalGroups)
        return view('admin.political_groups.index',[ 'politicalGroups'=> $politicalGroups, 'elections' => $elections ]);
    }

    /**
     * Show the form for creating a new PoliticalGroup.
     *
     * @return Response
     */
    public function create()
    {

       
        
        
        $elections = election::all(); 
       
        return view('admin.political_groups.create',['elections' => $elections ]);
    }

    /**
     * Store a newly created PoliticalGroup in storage.
     *
     * @param CreatePoliticalGroupRequest $request
     *
     * @return Response
     */
    public function store(CreatePoliticalGroupRequest $request)
    {
        $input = $request->all();

        $this->validate( $request, [ 

            'title'                 => 'required',
            // 'symbol'                => 'required|max:20',
            // 'founder'               => 'required',
            // 'description'           => 'nullable|min:20| max:500',
            // 'year'                  => 'required',
            // 'election_id'           => 'required',


         ] );

        $politicalGroup = $this->politicalGroupRepository->create($input);

        Flash::success('Political Group saved successfully.');

        return redirect(route('admin.politicalGroups.index'));
    }

    /**
     * Display the specified PoliticalGroup.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $politicalGroup = $this->politicalGroupRepository->findWithoutFail($id);

        if (empty($politicalGroup)) {
            Flash::error('Political Group not found');

            return redirect(route('admin.politicalGroups.index'));
        }

        return view('admin.political_groups.show')->with('politicalGroup', $politicalGroup);
    }

    /**
     * Show the form for editing the specified PoliticalGroup.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $politicalGroup = $this->politicalGroupRepository->findWithoutFail($id);

         $elections = election::all(); 

         //dd($elections);
        if (empty($politicalGroup)) {
            Flash::error('Political Group not found');

            return redirect(route('admin.politicalGroups.index'));
        }

        return view('admin.political_groups.edit', [ 'politicalGroup' => $politicalGroup, 'elections' => $elections ] );
    }

    /**
     * Update the specified PoliticalGroup in storage.
     *
     * @param  int              $id
     * @param UpdatePoliticalGroupRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePoliticalGroupRequest $request)
    {
        $politicalGroup = $this->politicalGroupRepository->findWithoutFail($id);


         $this->validate( $request, [ 

            'title'                 => 'required',
            // 'symbol'                => 'required|max:20',
            // 'founder'               => 'required',
            // 'description'           => 'nullable|min:20| max:500',
            // 'year'                  => 'required',
            // 'election_id'           => 'required',


         ] );
        
        if (empty($politicalGroup)) {
            Flash::error('Political Group not found');

            return redirect(route('admin.politicalGroups.index'));
        }

        $politicalGroup = $this->politicalGroupRepository->update($request->all(), $id);

        Flash::success('Political Group updated successfully.');

        return redirect(route('admin.politicalGroups.index'));
    }

    /**
     * Remove the specified PoliticalGroup from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $politicalGroup = $this->politicalGroupRepository->findWithoutFail($id);

        if (empty($politicalGroup)) {
            Flash::error('Political Group not found');

            return redirect(route('admin.politicalGroups.index'));
        }

        $this->politicalGroupRepository->delete($id);

        Flash::success('Political Group deleted successfully.');

        return redirect(route('admin.politicalGroups.index'));
    }
}
