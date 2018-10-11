<?php



namespace App\Http\Controllers\Voter;



use App\Http\Requests\CreatevoteRequest;

use App\Http\Requests\UpdatevoteRequest;

use App\Repositories\voteRepository;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Flash;
use Session;
use Prettus\Repository\Criteria\RequestCriteria;

use Response;



use App\User;



use Auth;



use DB;



use Mail;



use App\Models\Participant;

use App\Models\PoliticalGroup;



use App\Models\vote;

use App\Models\Election;



class VoterDashboardController extends Controller

{













   public function index() { 


    $voter_id = Auth::guard('voter')->user()->id;    

    $today  = date('Y-m-d H:i:s');



    $elections = Election::where( 'voting_start', '<=', $today )->where( 'voting_end', '>', $today )->get();

   

     $ids   = [];



     $endTime = [];



    foreach( $elections as $election)

     {



        $endTime[] = $election->voting_end;



        $vote = DB::table( 'vote' )->where('election_id', $election['id'] )->where( 'voter_id', $voter_id )->first();





        // dd($vote[0]->participant_id);



        if( !empty( $vote ) )

         {

            array_push($ids, ['cid'  => $vote->participant_id, 'eid'   => $vote->election_id ]);



            

            //$ids['eid'] = $vote->election_id;

         }   



     }   

        

                                                            //, 'endTime' => $endTime

    return view( 'voter.dashboard.index', ['elections' => $elections, 'candidates' => $ids ]  );    

    

    }









   

}

