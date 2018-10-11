<?php

namespace App\Http\Controllers\Voter;

use App\Http\Requests\CreatevoteRequest;
use App\Http\Requests\UpdatevoteRequest;
use App\Repositories\voteRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
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

class VoterElectingController extends Controller
{
    /** @var  voteRepository */
    private $voteRepository;

    public function __construct(voteRepository $voteRepo)
    {
        $this->voteRepository = $voteRepo;
    }

    /**
     * Display a listing of the vote.
     *
     * @param Request $request
     * @return Response
     */
    
 



    public function voteCast(Request $request)
    {

        // return $request->all();

        $input['voter_id']       = $request->voter_id;
        $input['election_id']    = $request->election_id;
        $input['participant_id'] = $request->participant_id;

        $phone                   = $request->mobile_no;

        

       

        $email    = User::where( 'id',$request->voter_id )->select('email')->first()->email;
        
        $election = Election::where( 'id',$request->election_id )->select('title')->first()->title;
        $start    = Election::where( 'id',$request->election_id )->select('voting_start')->first()->voting_start;
        $end      = Election::where( 'id',$request->election_id )->select('voting_end')->first()->voting_end;

        $participant = Participant::where( 'id',$request->participant_id )->select('name')->first()->name;
        
         //dd($start. " AND " .$end);
         
        
        $start = strtotime( $start );                        //2015-02-03
        $end   = strtotime( $end );                        //2015-02-03
               
        
        $now   = date( 'F d, Y  H:m:s' );

        $voting_start            =   date( 'F d, Y  H:m:s' , $start );
        $voting_end              =   date( 'F d, Y  H:m:s' , $end );
        

         //dd($voting_start. " AND " .$voting_end);


        // if( $voting_start <= $now && $voting_end > $now )
        // {


        
       
       
        $result  = vote::updateOrCreate($input);


        if($result)
          {

            $data  = [ 'user' => $email, 'election' => $election, 'participant' =>$participant, 
                       'voting_start' => $voting_start, 'voting_end' => $voting_end ];

        
        //Acknowledgement Email

         Mail::send('voter.electing.email_ack' , $data, function($message) use( $data ) {
            


             $message->to($data['user'])->subject
                ('Acknowledgement');
             
         });


         //Acknowledgement Message

            $ch = curl_init('https://textbelt.com/text');
            $data = array(
             
              'phone' => $phone,
              
              'message' => 'You casted your vote to candidate '.$participant.'  in '.$election.' election held between '.$voting_start.' to '.$voting_end.'.',
              
              // 'phone' => '03030364933',
              
              // 'message' => 'Mr Waseem you have been selected by Mr Ali RAZA MAHAR in the Australian Endeavour Scholarship as a 
              //               reference person so we will be keep in touch with you for verification.',  


              'key' => '9b0ce7bf76e864c1d27985d952ef8536fe2c94ea7hPTcVTJKLUZrI3KCn0mNhM0e',
            );

            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);
            curl_close($ch);



          // }

            Flash::success('Vote saved successfully.');

            return redirect( route('voter.dashboard') );


           }  

          //   Flash::success('Sorry! Election Time Ended.');

          //   return redirect( route('voter.dashboard') );


    }



      public function electionVote(Request $request)
    {
        $election_id =  $request->election_id;
        $voter_id    =  $request->voter_id;



        //dd($election_id);

        $vote = DB::table( 'vote' )->where('election_id', $election_id)->where( 'voter_id', $voter_id )->get();
        

        
         $election          = Election::where( 'id', $election_id )->first();
        
         $p_ids             =  json_decode($election->election_participant_ids);

         //return $p_ids;
         if( !empty($p_ids) )
         {

         $participants      = Participant::whereIn( 'id' , $p_ids )->get();

         $total             = vote::where( 'election_id', $election->id )->get()->count();
         
          $totalVotes = [];
          
          $groups = [];

         foreach ($participants as $participant) {

            $group = PoliticalGroup::where( 'id', $participant->political_group_id )->first();

            $groups[] = $group->title; 

            // $count = vote::where( 'participant_id', $participant->id )->get()->count();
            // array_push($totalVotes, ['count'  => $count,'name'   => $participant->name]);             
            
              $totalVotes[]        =  vote::where( 'participant_id', $participant->id )
                                      ->where( 'election_id', $election->id )->get()->count();

         }

            //dd( $groups );

        if ( count( $vote) != 0 ) {

            $isVoteCasted = 1;
            //return $vote;

            $participant_id    =     $vote[0]->participant_id;

            
            return view( 'voter.electing.summary', ['participants' => $participants, 'election_id' => $election->id, 
                         'isVoteCasted' => $isVoteCasted, 'election' => $election, 'candidate' => $participant_id,
                         'totalVotes'   => $totalVotes, 'grandTotal' => $total, 'groups' => $groups ] );


        } else {

            $start =  $election->voting_start;
            $end   =  $election->voting_end;

            $now   = date( 'F d, Y  H:m:s' );

            // $start            = date('F d, Y  H:m:s', $start  );
            // $end              = date('F d, Y  H:m:s', $end );   

             $isVoteCasted = 0;

             // echo $start;
             // echo $end;
             // echo $now;

          // if( $start <= $now && $end > $now )
          //   {
        
                 return view( 'voter.electing.votecast', ['participants' => $participants, 'election_id' => $election->id, 
                         'isVoteCasted' => $isVoteCasted, 'election' => $election, 'groups' => $groups, 'grandTotal' => $total ] );
          //   }else{


                

          //      Flash::success('Sorry! Election Time Ended.');

          //      return redirect()->back();

          //   }

            
            
        }


  
    }else{
            $isVoteCasted = 0;

            $participants = 0;

             return view( 'voter.electing.votecast', ['participants' => $participants, 'election_id' => $election->id, 
                         'isVoteCasted' => $isVoteCasted, 'election' => $election,  ] );
            //return "fail";
    }

}

    




   
}
