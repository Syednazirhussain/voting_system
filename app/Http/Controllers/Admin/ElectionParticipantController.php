<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateElectionParticipantRequest;
use App\Http\Requests\Admin\UpdateElectionParticipantRequest;
use App\Repositories\ElectionParticipantRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\Election;
use App\Models\Participant;
use App\Models\ElectionParticipant;


use Illuminate\Validation\Rule;

use DB;




class ElectionParticipantController extends Controller
{
    /** @var  ElectionParticipantRepository */
    private $electionParticipantRepository;

    public function __construct(ElectionParticipantRepository $electionParticipantRepo)
    {
        $this->electionParticipantRepository = $electionParticipantRepo;
    }

    /**
     * Display a listing of the ElectionParticipant.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->electionParticipantRepository->pushCriteria(new RequestCriteria($request));




       
       $electionParticipants = $this->electionParticipantRepository->all();

       //  foreach ($electionParticipants as $electionParticipant) {
       //      echo $electionParticipant->election->title;
       //  }

       // dd()
       //$electionParticipants = ElectionParticipant::groupBy('candidate_id')->get();

       
       //dd($electionParticipants); 


       $electionIds = [];
       $index = 0;
        foreach( $electionParticipants as $ep) {
            $electionIds[$index] = $ep->election_id;
            $index++;
        }

        $elections = Election::find($electionIds);


        //dd($electionParticipants);


        $participants = Participant::all();

        //dd( $electionParticipants );
        return view('admin.election_participants.index', [ 'electionParticipants' => $electionParticipants, 
                                                            'elections' => $elections, 'participants' => $participants ] );
    }

    /**
     * Show the form for creating a new ElectionParticipant.
     *
     * @return Response
     */
    public function create()
    {

        $elections    = Election::all();

        $participants = Participant::all();


        return view('admin.election_participants.create', [ 'elections' => $elections, 'participants' => $participants ] );
    }

    /**
     * Store a newly created ElectionParticipant in storage.
     *
     * @param CreateElectionParticipantRequest $request
     *
     * @return Response
     */
    public function store(CreateElectionParticipantRequest $request)
    {
        
         $this->validate( $request, [

            'election_id'  => 'required',
            'candidate_id' => 'required',

            

        ] );


        $input     = $request->all();


        $elections =  $input['election_id'];
        
        unset($input['_token'] );
        //unset($input['status'] );
        

        foreach ($elections as $eid) {
            
            $input['election_id'] = $eid;

            $electionParticipant = ElectionParticipant::updateOrCreate( $input );
            //$electionParticipant = $this->electionParticipantRepository->create($input);

        }

        // $electionId             = implode(',', $input['election_id']);

        // $input[ 'election_id' ]  = "$electionId";

        //dd($input);

       


        Flash::success('Election Participant saved successfully.');

        return redirect(route('admin.electionParticipants.index'));
    }

    /**
     * Display the specified ElectionParticipant.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $electionParticipant = $this->electionParticipantRepository->findWithoutFail($id);

        if (empty($electionParticipant)) {
            Flash::error('Election Participant not found');

            return redirect(route('admin.electionParticipants.index'));
        }

        return view('admin.election_participants.show')->with('electionParticipant', $electionParticipant);
    }

    /**
     * Show the form for editing the specified ElectionParticipant.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
       $electionParticipant = $this->electionParticipantRepository->findWithoutFail($id);

        $elections    = Election::all();

        $participants = Participant::all();


        // dd(  json_encode( $electionParticipant[ 'election_id' ]) );

        // $eid = explode( ',', $electionParticipant['election_id'] );

        // var_dump($eid);
        // dd($eid );


        // $eid =  explode( ',', $electionParticipant['election_id']);
        
        // print_r($eid);
        // die;

        if (empty($electionParticipant)) {
            Flash::error('Election Participant not found');

            return redirect(route('admin.electionParticipants.index'));
        }


        return view('admin.election_participants.edit', [ 'electionParticipant' => $electionParticipant, 
                                                          'elections' => $elections, 'participants' => $participants ]);
    }

    /**
     * Update the specified ElectionParticipant in storage.
     *
     * @param  int              $id
     * @param UpdateElectionParticipantRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateElectionParticipantRequest $request)
    {
        
        $this->validate( $request, [

            'election_id'  => 'required',
            'candidate_id' => 'required',

        ] );

        $electionParticipant = $this->electionParticipantRepository->findWithoutFail($id);

        if (empty($electionParticipant)) {
            Flash::error('Election Participant not found');

            return redirect(route('admin.electionParticipants.index'));
        }


        $data[ 'candidate_id' ] = $request->candidate_id;
        //$data[ 'status' ] = $request->status;


        //dd($id);

        //return $request->all();
        $elections = $request->election_id;

        foreach ($elections as $eid) {
            
            $data['election_id'] = $eid;
            
            $electionParticipant = ElectionParticipant::updateOrCreate( $data );

            //$electionParticipant = $this->electionParticipantRepository->update($data, $id);

        }
       
        // dd($data);



        Flash::success('Election Participant updated successfully.');

        return redirect(route('admin.electionParticipants.index'));
    }

    /**
     * Remove the specified ElectionParticipant from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $electionParticipant = $this->electionParticipantRepository->findWithoutFail($id);

        if (empty($electionParticipant)) {
            Flash::error('Election Participant not found');

            return redirect(route('admin.electionParticipants.index'));
        }

        $this->electionParticipantRepository->delete($id);

        Flash::success('Election Participant deleted successfully.');

        return redirect(route('admin.electionParticipants.index'));
    }
}
