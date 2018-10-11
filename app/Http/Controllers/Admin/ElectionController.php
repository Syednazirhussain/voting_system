<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateElectionRequest;
use App\Http\Requests\UpdateElectionRequest;
use App\Repositories\ElectionRepository;
use App\Http\Controllers\Controller;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use DB;

use App\Models\Participant;
use App\Models\Election;

class ElectionController extends Controller
{
    /** @var  ElectionRepository */
    private $electionRepository;

    public function __construct(ElectionRepository $electionRepo)
    {
        $this->electionRepository = $electionRepo;
    }

    /**
     * Display a listing of the Election.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->electionRepository->pushCriteria(new RequestCriteria($request));
        $elections = $this->electionRepository->all();

        // $participants = [];

        // foreach ($elections as  $election) {
            
        //       $participants[] =  $elections->election_participant_ids;

        // }


        $key_value_pair = [];
        foreach ($elections as $election) 
        {
            $participant_ids =  json_decode($election->election_participant_ids);
            if(is_array($participant_ids))
            {
                $participant_names = [];
                foreach ($participant_ids as $participant_id) 
                {
                    array_push($participant_names, Participant::find($participant_id)->name);
                }
                $key_value_pair[$election->id] = $participant_names;
            }
        }

        $data = [
            'elections'      => $elections,
            'key_value_pair'  => $key_value_pair  
        ];


        return view('admin.elections.index',$data);
    }

    public function assignParticipants( Request $request )
    {
        
        $id = $request->id;

        $participants = Participant::all();


        $election    = Election::where( 'id',$id )->get();

        $candidates  =  json_decode($election[0]->election_participant_ids);

        $data = [ 'participants' => $participants, 'election_id' => $id, 'election_participant_ids' => $candidates ];

        //dd($data);
        return view( 'admin.elections.election_participants', $data );
    }

    /**
     * Show the form for creating a new Election.
     *
     * @return Response
     */
    public function create()
    {

        $participants = Participant::all();

        return view('admin.elections.create', [ 'participants' => $participants ]);
    }

    /**
     * Store a newly created Election in storage.
     *
     * @param CreateElectionRequest $request
     *
     * @return Response
     */
    public function store(CreateElectionRequest $request)
    {

       
        $this->validate( $request, [
            'title'                      => 'required | max:20',
            'voting_start'               => 'required ',
            'voting_end'                 => 'required ',
            'election_participant_ids'   => 'required',
        ]);

         

         $input = $request->all();
         
         $input['voting_start'] = date('Y-m-d H:i:s', strtotime($request->voting_start));   
         $input['voting_end']   = date('Y-m-d H:i:s', strtotime($request->voting_end)); 

        $input[ 'election_participant_ids' ] = json_encode(  $input[ 'election_participant_ids' ] );

        // return $input[ 'election_participant_ids' ];

        // dd($input);

        $election = $this->electionRepository->create($input);

        Flash::success('Election saved successfully.');

        return redirect(route('admin.elections.index'));
    }

    /**
     * Display the specified Election.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $election = $this->electionRepository->findWithoutFail($id);

        

        if (empty($election)) {
            Flash::error('Election not found');

            return redirect(route('admin.elections.index'));
        }

        return view('admin.elections.show')->with('election', $election);
    }

    /**
     * Show the form for editing the specified Election.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $election = $this->electionRepository->findWithoutFail($id);

        // dd($election);

        if (empty($election)) {
            Flash::error('Election not found');

            return redirect(route('admin.elections.index'));
        } 


        $start_date = date('m-d-Y H:m', strtotime($election->voting_start)); 
        $end_date = date('m-d-Y H:m', strtotime($election->voting_end));


        $participants = Participant::all();


        $ep_ids = json_decode( $election->election_participant_ids);

        $data = [ 
            'election' => $election,
            'election_participant_ids' => $ep_ids,
            'participants' => $participants,
            'start_date'   => $start_date,
            'end_date'     => $end_date 
        ];

        return view('admin.elections.edit', $data);
    }

    /**
     * Update the specified Election in storage.
     *
     * @param  int              $id
     * @param UpdateElectionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateElectionRequest $request)
    {

       // return $request->all();

        $election = $this->electionRepository->findWithoutFail($id);

        $this->validate( $request, [
            'title'                       => 'required | max:20',
            
            'voting_start'                => 'required ',
            'voting_end'                  => 'required ',
            'election_participant_ids'    => 'required ',
            //'description'   => 'nullable | max:200',
        ]);
        
            $input = $request->all();

            $input['voting_start'] = date('Y-m-d H:i:s', strtotime($request->voting_start));   
            $input['voting_end']   = date('Y-m-d H:i:s', strtotime($request->voting_end)); 

            unset($input[ '_method' ] );
            unset($input[ '_token' ] );
           // dd($input);

            $input[ 'election_participant_ids' ] = json_encode( $request->election_participant_ids );

            //dd($input); 

        
        if (empty($election)) {
            Flash::error('Election not found');

            return redirect(route('admin.elections.index'));
        }

            Election::where( 'id', $id )->update( $input );

        //$election = $this->electionRepository->update($input, $id);

        Flash::success('Election updated successfully.');

        return redirect(route('admin.elections.index'));
    }

    /**
     * Remove the specified Election from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $election = $this->electionRepository->findWithoutFail($id);

        if (empty($election)) {
            Flash::error('Election not found');

            return redirect(route('admin.elections.index'));
        }

        $this->electionRepository->delete($id);

        Flash::success('Election deleted successfully.');

        return redirect(route('admin.elections.index'));
    }






    public function storeParticipants(Request $request)
    {   


        // return $request->election_participant_ids;
        // die;

        $data[ 'election_participant_ids' ] =  json_encode( $request->election_participant_ids );
        //$data[ 'election_participant_ids' ] =   implode( ', ', $request->election_participant_ids );

        

        $query =  Election::where( 'id', $request->id )->update( $data );

         Flash::success('Participant assigned successfully.');

        return redirect(route('admin.elections.index'));


    }



    public function endElection(Request $request,$election_id)
    {   

        $id = $election_id;
        $now = date( "Y-m-d H:i:s" );
        $election = Election::where( 'id',$id )->first();
        $election_title = $election->title; 

        $start = $election->voting_start;
        $end   = $election->voting_end;

    
        if( $start <= $now && $end > $now )
        {

            $data = ['voting_end' => $now ];
            $result = Election::where( 'id',$id )->update( $data );
            if($result)
            {
                Flash::success( "Election Ended Successfully" );
                //return view('admin.reports.index', ['candidate1' => $candidate1, 'candidate2' => $candidate2]);
                return redirect(  )->route('admin.reports', [ $id ] );
            }
        }

        Flash::success("Election Already Ended ");
        //return view('admin.reports.index', ['candidate1' => $candidate1, 'candidate2' => $candidate2]);   
        return redirect()->route('admin.reports', [ $id ] );
    }


}
