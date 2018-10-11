<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;
use DB;
use Flash;
use App\Models\Election;
use App\Models\PoliticalGroup;
use App\Models\Participant;
use App\Models\vote;


class ReportController extends Controller
{

    public function index( Request $request, $id )
    {

         $election_id = $id;

         $election_title = Election::where('id',$election_id)->select('title')->first();
         $election_title  =  $election_title->title;

        
      
        if( isset($request->state) && $request->state != "all" )
        {
          $state = $request->state;

          $overall  = DB::SELECT( "SELECT v.election_id, e.title, COUNT(v.id) AS votes, v.participant_id, pg.title as participant_name FROM vote as v INNER JOIN participants as p ON p.id = v.participant_id INNER JOIN political_groups as pg ON pg.id = p.political_group_id INNER JOIN election AS e ON e.id = v.election_id INNER JOIN users as u ON u.id = v.voter_id WHERE v.election_id = $election_id AND u.state = '".$state."' GROUP BY v.participant_id" );
           

          $oc_total = DB::SELECT( "SELECT COUNT(vote.id) as total FROM vote INNER JOIN users 
                                 WHERE users.state = '".$state."' AND vote.election_id = $election_id");

         
           $oc_total = $oc_total[0]->total;

           $overallCand = [];

           $overallVote = [];

           $overallPer = [];

           if(empty( $overall ) )
           {
              $overall = []; 
           }
           else
           {    
              foreach ($overall as $key => $value) 
              {
                 
                 $overallCand[] = $value;
              }

              foreach ($overallCand as  $oc)
              {
                  $overallVote[] = $oc->votes;
              }
          
              foreach ($overallVote as  $ov) 
              {
                $overallPer[] =  round( ( $ov / $oc_total ) * 100 );
              }
          
              $overall  = [ 'overallCand' => $overallCand, 'overallPer' =>$overallPer ];
           }

         // MALE

            $males  = DB::SELECT( "SELECT v.election_id, e.title, COUNT(v.id) AS votes, v.participant_id, pg.title as participant_name, u.gender FROM vote as v INNER JOIN participants as p ON p.id = v.participant_id INNER JOIN political_groups as pg ON pg.id = p.political_group_id INNER JOIN election AS e ON e.id = v.election_id INNER JOIN users as u ON u.id = v.voter_id WHERE v.election_id = $election_id AND u.gender = 'MALE' AND u.state = '".$state."' GROUP BY v.participant_id " );



             $total_votes = DB::SELECT( "SELECT COUNT(vote.id) as total FROM vote INNER JOIN users ON users.id = vote.voter_id WHERE users.state = '".$state."' AND vote.election_id = $election_id AND users.gender = 'MALE' " );

            
             $total_votes = $total_votes[0]->total;


            if(empty( $males ) )
            {
              $males = []; 
            }
            else
            {

              foreach ($males as $male) {
                 
                 $maleCand[] = $male;
              }

              foreach ($maleCand as  $mc) 
              {
                  $maleVote[] = $mc->votes;
              }
            
              foreach ($maleVote as  $mv) 
              {
                $malePer[] =  round( ( $mv / $total_votes ) * 100 );
              }
            

          
              $males  = [ 'maleCand' => $maleCand, 'malePer' =>$malePer ];
            }

            //Female    
            $females  = DB::SELECT( "SELECT v.election_id, e.title, COUNT(v.id) AS votes, v.participant_id, pg.title as participant_name, u.gender FROM vote as v INNER JOIN participants as p ON p.id = v.participant_id INNER JOIN political_groups as pg ON pg.id = p.political_group_id INNER JOIN election AS e ON e.id = v.election_id INNER JOIN users as u ON u.id = v.voter_id WHERE v.election_id = $election_id AND u.gender = 'FEMALE' AND u.state = '".$state."' GROUP BY v.participant_id ");


            $fc_total = DB::SELECT( "SELECT COUNT(vote.id) as total FROM vote INNER JOIN users ON users.id = vote.voter_id WHERE users.state = '".$state."' AND vote.election_id = $election_id AND users.gender = 'FEMALE'");

            
            $fc_total = $fc_total[0]->total;


           if(empty( $females ) )
           {
              $females = []; 
           }
           else
           {
            foreach ($females as $female) 
            {
               $femaleCand[] = $female;
            }

            foreach ($femaleCand as  $fc) 
            {
                $femaleVote[] = $fc->votes;
            }
            
            foreach ($femaleVote as  $fv) 
            {
              $femalePer[] =  round( ( $fv / $fc_total ) * 100 );
            }
            
            $females  = [ 'femaleCand' => $femaleCand, 'femalePer' =>$femalePer ];
           
           }  


           //NOT DISCLOSED    
            
            $not_disclosed  = DB::SELECT( "SELECT v.election_id, e.title, COUNT(v.id) AS votes, v.participant_id, pg.title as participant_name, u.gender FROM vote as v INNER JOIN participants as p ON p.id = v.participant_id INNER JOIN political_groups as pg ON pg.id = p.political_group_id INNER JOIN election AS e ON e.id = v.election_id INNER JOIN users as u ON u.id = v.voter_id WHERE v.election_id = $election_id AND u.gender = 'NOT DISCLOSED' AND u.state = '".$state."' GROUP BY v.participant_id ");
            
            $nc_total = DB::SELECT( "SELECT COUNT(vote.id) as total FROM vote INNER JOIN users ON users.id = vote.voter_id WHERE users.state = '".$state."' AND vote.election_id = $election_id AND users.gender = 'NOT DISCLOSED' " );

  
            $nc_total = $nc_total[0]->total;

             if(empty( $not_disclosed ) )
             {
                $not_disclosed = [];
             }
             else
             {
                foreach ($not_disclosed as $nd) 
                {
                   $ndCand[] = $nd;
                }

                foreach ($ndCand as  $ndc) 
                {
                    $ndVote[] = $ndc->votes;
                }
              
                foreach ($ndVote as  $ndv) 
                {
                  $ndPer[] =  round( ( $ndv / $nc_total ) * 100 );
                }
        
                $not_disclosed  = [ 'ndCand' => $ndCand, 'ndPer' =>$ndPer ];
             }
           
           // return $not_disclosed;


           //AGE BETWEEN 18 - 30



  $eighteenPlus  = DB::SELECT( "SELECT v.election_id, e.title, COUNT(v.id) AS votes, v.participant_id, pg.title as participant_name, u.age FROM vote as v INNER JOIN participants as p ON p.id = v.participant_id INNER JOIN political_groups as pg ON pg.id = p.political_group_id INNER JOIN election AS e ON e.id = v.election_id INNER JOIN users as u ON u.id = v.voter_id WHERE v.election_id = $election_id AND u.age BETWEEN '18' AND '30' AND u.state = '".$state."' GROUP BY v.participant_id" );

             $ep_total = DB::SELECT( "SELECT COUNT(vote.id) as total FROM vote INNER JOIN users ON users.id = vote.voter_id WHERE users.state = '".$state."' AND vote.election_id = $election_id AND users.age BETWEEN '18' AND '30' ");

            
             $ep_total = $ep_total[0]->total;


        if(empty( $eighteenPlus ) ){

            
            $eighteen = []; 


            }else{



               foreach ( $eighteenPlus as $ep ) {
               
               $epCand[] = $ep;
            }

          
            foreach ($epCand as  $ec) {


                $ecVote[] = $ec->votes;

            }
            
            
            
            foreach ($ecVote as  $ev) {


              $epPer[] =  round( ( $ev / $ep_total ) * 100 );

            }
            

          
            $eighteen  = [ 'epCand' => $epCand, 'epPer' =>$epPer ];
            
        }
            
           // return $eighteen;

        //AGE BETWEEN 31 - 50


              $thirtyPlus  = DB::SELECT( "SELECT v.election_id, e.title, COUNT(v.id) AS votes, v.participant_id, pg.title as participant_name, u.age FROM vote as v INNER JOIN participants as p ON p.id = v.participant_id INNER JOIN political_groups as pg ON pg.id = p.political_group_id INNER JOIN election AS e ON e.id = v.election_id INNER JOIN users as u ON u.id = v.voter_id WHERE v.election_id = $election_id AND u.age BETWEEN '31' AND '50' AND u.state = '".$state."' GROUP BY v.participant_id");


              $tp_total = DB::SELECT( "SELECT COUNT(vote.id) as total FROM vote INNER JOIN users ON vote.voter_id = users.id WHERE users.state = '".$state."' AND vote.election_id = $election_id AND users.age BETWEEN '31' AND '50' ");

            
              $tp_total = $tp_total[0]->total;



            if(empty( $thirtyPlus ) ){

            
            $thirty = []; 


            }else{  


              
               foreach ($thirtyPlus as $thirty) {
               
               $thirtyCand[] = $thirty;
            }

          
            foreach ($thirtyCand as  $tc) {


                $thirtyVote[] = $tc->votes;

            }
            
            
            
            foreach ($thirtyVote as  $tv) {


              $thirtyPer[] =  round( ( $tv / $tp_total ) * 100 );

            }
            

          
            $thirty  = [ 'thirtyCand' => $thirtyCand, 'thirtyPer' =>$thirtyPer ];

           
             }
           
           // return $thirty; 

           //AGE ABOVE 50


              $fiftyPlus  = DB::SELECT( "SELECT v.election_id, e.title, COUNT(v.id) AS votes, v.participant_id, pg.title as participant_name, u.age FROM vote as v INNER JOIN participants as p ON p.id = v.participant_id INNER JOIN political_groups as pg ON pg.id = p.political_group_id INNER JOIN election AS e ON e.id = v.election_id INNER JOIN users as u ON u.id = v.voter_id WHERE v.election_id = $election_id AND u.age >= '51' AND u.state = '".$state."' GROUP BY v.participant_id" );

              $ftp_total = DB::SELECT( "SELECT COUNT(vote.id) as total FROM vote INNER JOIN users ON vote.voter_id = users.id WHERE users.state = '".$state."' AND vote.election_id = $election_id AND users.age >= '51' ");

            
              $ftp_total = $ftp_total[0]->total;

              if( empty( $fiftyPlus ) ){

            
              $fifty = []; 


            }else{


            foreach ($fiftyPlus as $fifty) {
               
               $fiftyCand[] = $fifty;
            }

          
            foreach ($fiftyCand as  $fc) {


                $fiftyVote[] = $fc->votes;

            }
            
            
            
            foreach ($fiftyVote as  $fv) {


              $fiftyPer[] =  round( ( $fv / $ftp_total ) * 100 );

            }
            

          
            $fifty  = [ 'fiftyCand' => $fiftyCand, 'fiftyPer' =>$fiftyPer ];  

          
          }


          //END FIFTY  

          //VOTER TURNOUT


             $totalUsers = User::where('role','user')->where( 'state',$state )->get()->count(); // 325
             
             // return $totalUsers;
            // $voters     = vote::where( 'election_id', $election_id )->get()->count();

             $voters     = DB::table( 'vote' )->join( 'users','users.id', '=', 'vote.voter_id' )
                                              ->where( 'vote.election_id', $election_id  )
                                              ->where( 'users.state', $state  )->get()->count();
              
              // return $voters;

             $percentage = ( $voters / $totalUsers ) * 100;


            $voteCasted =  round( $percentage ); 

            
            $notCasted =  100 - $voteCasted ; 
            


            $trunout  = [ 'voteCasted' => $voteCasted, 'notCasted' => $notCasted ];


            $totalGenders =  DB::SELECT( "SELECT COUNT(vote.id) as total FROM vote INNER JOIN users WHERE users.state = '".$state."' AND vote.election_id = ".$election_id);

            $gender_male =  DB::SELECT( "SELECT COUNT(u.gender) as male FROM users as u INNER JOIN vote as v ON u.id = v.voter_id WHERE u.gender = 'MALE' AND u.state = '".$state."' AND v.election_id = ".$election_id );

            $gender_female =  DB::SELECT( "SELECT COUNT(u.gender) as female FROM users as u INNER JOIN vote as v ON u.id = v.voter_id WHERE u.gender = 'FEMALE' AND u.state = '".$state."' AND v.election_id = ".$election_id );

            $gender_not_disclosed =  DB::SELECT( "SELECT COUNT(u.gender) as not_disclosed FROM users as u INNER JOIN vote as v ON v.voter_id = u.id WHERE u.gender = 'NOT DISCLOSED' AND u.state = '".$state."' AND v.election_id = ".$election_id );

            $age_eighteen =  DB::SELECT( "SELECT COUNT(u.age) as eighteen FROM users as u INNER JOIN vote AS v ON u.id = v.voter_id WHERE (YEAR(CURRENT_TIMESTAMP) - YEAR(dob) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(dob, 5))) BETWEEN '18' AND '30' AND u.state = '".$state."' AND v.election_id = ".$election_id );

            $age_thirty =  DB::SELECT( "SELECT COUNT(u.age) as thirty FROM users as u INNER JOIN vote as v ON u.id = v.voter_id WHERE (YEAR(CURRENT_TIMESTAMP) - YEAR(dob) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(dob, 5))) BETWEEN '31' AND '50' AND u.state = '".$state."' AND v.election_id = ".$election_id );

            $age_fifty =  DB::SELECT( "SELECT COUNT(u.age) as fifty FROM users as u INNER JOIN vote as v ON u.id = v.voter_id WHERE (YEAR(CURRENT_TIMESTAMP) - YEAR(dob) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(dob, 5))) >= '51' AND u.state = '".$state."' AND v.election_id = ".$election_id );

            if ($totalGenders[0]->total > 0) 
            {
              $perMale = round( ( $gender_male[0]->male / $totalGenders[0]->total ) * 100 );
              $perFemale = round( ( $gender_female[0]->female / $totalGenders[0]->total ) * 100 );
              $perND =  round( ( $gender_not_disclosed[0]->not_disclosed / $totalGenders[0]->total ) * 100 );
              $perEighteen = round( ( $age_eighteen[0]->eighteen / $totalGenders[0]->total ) * 100 );
              $perThirty = round( ( $age_thirty[0]->thirty / $totalGenders[0]->total ) * 100 );
              $perFifty = round( ( $age_fifty[0]->fifty / $totalGenders[0]->total ) * 100 );

            }
            else
            {
              $perMale = 0;
              $perFemale = 0;
              $perND = 0;
              $perEighteen = 0;
              $perThirty = 0;
              $perFifty = 0;
            }


            $genders  = [ 
              'gender_male' => $perMale,
              'gender_female' => $perFemale, 
              'gender_not_disclosed' => $perND 
            ];

            $ages  = [ 
              'age_eighteen' => $perEighteen,
              'age_thirty' => $perThirty, 
              'age_fifty' => $perFifty 
            ];
            
            $data = [ 
              'overallData' => $overall,
              'males' => $males,
              'females' => $females, 
              'election_title' =>  $election_title,
              'not_disclosed' => $not_disclosed,
              'eighteen'    => $eighteen, 
              'thirty' => $thirty,
              'fifty'     => $fifty, 
              'trunout'  =>$trunout,
              'genders'     =>$genders, 
              'ages'   => $ages
            ];

            return view( 'admin.reports.index', $data );
        
        }else{

         

          //ALL STATES

        //charts


         //OVERALL

         $overall  = DB::SELECT( "SELECT v.election_id, e.title, COUNT(v.id) AS votes, v.participant_id, pg.title as participant_name FROM vote as v INNER JOIN participants as p ON p.id = v.participant_id INNER JOIN political_groups as pg ON pg.id = p.political_group_id INNER JOIN election AS e ON e.id = v.election_id WHERE v.election_id = $election_id GROUP BY v.participant_id" );



          

         $oc_total = DB::SELECT( "SELECT COUNT(vote.id) as total FROM vote WHERE vote.election_id = $election_id");

         
         $oc_total = $oc_total[0]->total;

         $overallCand = [];

         $overallVote = [];

         $overallPer = [];

         $winner = [];


         if(!empty( $overall ) ){

            // $winner['votes'] = $overall[0]['votes'];

            $max_votes = $overall[0]->votes;
            $winner_id = $overall[0]->participant_id;
            $winner_party = $overall[0]->participant_name;

            foreach ($overall as $key => $value) {

              if($overall[$key]->votes  > $max_votes )
              {
                  $max_votes =    $overall[$key]->votes;
                  $winner_id =    $overall[$key]->participant_name;
                  $winner_party = $overall[$key]->participant_id;


              }
               
               $overallCand[] = $value;
            }

            $winner_name = Participant::where('id',$winner_id)->select('name')->first();

            $winner['max_votes'] =  $max_votes;
            
            $winner['party'] = $winner_party;

            $winner['name'] = $winner_name->name;


            foreach ($overallCand as  $oc) {


                $overallVote[] = $oc->votes;

            }
            
            
            
            foreach ($overallVote as  $ov) {


              $overallPer[] =  round( ( $ov / $oc_total ) * 100 );

            }
            

          
            $overall  = [ 'overallCand' => $overallCand, 'overallPer' =>$overallPer ];

         }

          // return $overall;

         
            
           


            
         // MALE

         $males  = DB::SELECT( "SELECT v.election_id, e.title, COUNT(v.id) AS votes, v.participant_id, pg.title as participant_name, u.gender FROM vote as v INNER JOIN participants as p ON p.id = v.participant_id INNER JOIN political_groups as pg ON pg.id = p.political_group_id INNER JOIN election AS e ON e.id = v.election_id INNER JOIN users as u ON u.id = v.voter_id WHERE v.election_id = $election_id AND u.gender = 'MALE' GROUP BY v.participant_id " );



          $total_votes = DB::SELECT( "SELECT COUNT(vote.id) as total FROM vote INNER JOIN users ON users.id = vote.voter_id WHERE vote.election_id = $election_id AND users.gender = 'MALE'" );

            
            $total_votes = $total_votes[0]->total;


         if(empty( $males ) ){

            
            $males = []; 


         }else{


            foreach ($males as $male) {
               
               $maleCand[] = $male;
            }

          
            foreach ($maleCand as  $mc) {


                $maleVote[] = $mc->votes;

            }
            
            
            
            foreach ($maleVote as  $mv) {


              $malePer[] =  round( ( $mv / $total_votes ) * 100 );

            }
            

          
            $males  = [ 'maleCand' => $maleCand, 'malePer' =>$malePer ];

             


           

            
        }

        
              //Female    

        
        $females  = DB::SELECT( "SELECT v.election_id, e.title, COUNT(v.id) AS votes, v.participant_id, pg.title as participant_name, u.gender FROM vote as v INNER JOIN participants as p ON p.id = v.participant_id INNER JOIN political_groups as pg ON pg.id = p.political_group_id INNER JOIN election AS e ON e.id = v.election_id INNER JOIN users as u ON u.id = v.voter_id WHERE v.election_id = $election_id AND u.gender = 'FEMALE' GROUP BY v.participant_id ");


         $fc_total = DB::SELECT( "SELECT COUNT(vote.id) as total FROM vote INNER JOIN users ON users.id = vote.voter_id WHERE vote.election_id = $election_id AND users.gender = 'FEMALE'");

            
         $fc_total = $fc_total[0]->total;


         if(empty( $females ) ){

            
            $females = []; 


         }else{


            foreach ($females as $female) {
               
               $femaleCand[] = $female;
            }

          
            foreach ($femaleCand as  $fc) {


                $femaleVote[] = $fc->votes;

            }
            
            
            
            foreach ($femaleVote as  $fv) {


              $femalePer[] =  round( ( $fv / $fc_total ) * 100 );

            }
            

          
            $females  = [ 'femaleCand' => $femaleCand, 'femalePer' =>$femalePer ];
           
          
           


             

           }  
          
             //NOT DISCLOSED    


        $not_disclosed  = DB::SELECT( "SELECT v.election_id, e.title, COUNT(v.id) AS votes, v.participant_id, pg.title as participant_name, u.gender FROM vote as v INNER JOIN participants as p ON p.id = v.participant_id INNER JOIN political_groups as pg ON pg.id = p.political_group_id INNER JOIN election AS e ON e.id = v.election_id INNER JOIN users as u ON u.id = v.voter_id WHERE v.election_id = $election_id AND u.gender = 'NOT DISCLOSED' GROUP BY v.participant_id ");


         $nc_total = DB::SELECT( "SELECT COUNT(vote.id) as total FROM vote INNER JOIN users ON users.id = vote.voter_id WHERE vote.election_id = $election_id AND users.gender = 'NOT DISCLOSED'" );

            
         $nc_total = $nc_total[0]->total;

         if(empty( $not_disclosed ) ){

            
            $not_disclosed = []; 


         }else{


            foreach ($not_disclosed as $nd) {
               
               $ndCand[] = $nd;
            }

          
            foreach ($ndCand as  $ndc) {


                $ndVote[] = $ndc->votes;

            }
            
            
            
            foreach ($ndVote as  $ndv) {


              $ndPer[] =  round( ( $ndv / $nc_total ) * 100 );

            }
            

          
            $not_disclosed  = [ 'ndCand' => $ndCand, 'ndPer' =>$ndPer ];
            

           }
           
           // return $not_disclosed;


             //AGE BETWEEN 18 - 30


              $eighteenPlus  = DB::SELECT( "SELECT v.election_id, e.title, COUNT(v.id) AS votes, v.participant_id, pg.title as participant_name, u.age FROM vote as v INNER JOIN participants as p ON p.id = v.participant_id INNER JOIN political_groups as pg ON pg.id = p.political_group_id INNER JOIN election AS e ON e.id = v.election_id INNER JOIN users as u ON u.id = v.voter_id WHERE v.election_id = $election_id AND (YEAR(CURRENT_TIMESTAMP) - YEAR(dob) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(dob, 5))) BETWEEN '18' AND '30' GROUP BY v.participant_id" );

             $ep_total = DB::SELECT( "SELECT COUNT(vote.id) as total FROM vote INNER JOIN users ON users.id = vote.voter_id WHERE vote.election_id = $election_id AND users.age BETWEEN '18' AND '30' ");

            
             $ep_total = $ep_total[0]->total;


        if(empty( $eighteenPlus ) ){

            
            $eighteen = []; 


            }else{



               foreach ( $eighteenPlus as $ep ) {
               
               $epCand[] = $ep;
            }

          
            foreach ($epCand as  $ec) {


                $ecVote[] = $ec->votes;

            }
            
            
            
            foreach ($ecVote as  $ev) {


              $epPer[] =  round( ( $ev / $ep_total ) * 100 );

            }
            

          
            $eighteen  = [ 'epCand' => $epCand, 'epPer' =>$epPer ];
            
        }
            
           // return $eighteen;

           //AGE BETWEEN 18 - 30


$thirtyPlus  = DB::SELECT( "SELECT v.election_id, e.title, COUNT(v.id) AS votes, v.participant_id, pg.title as participant_name, u.age FROM vote as v INNER JOIN participants as p ON p.id = v.participant_id INNER JOIN political_groups as pg ON pg.id = p.political_group_id INNER JOIN election AS e ON e.id = v.election_id INNER JOIN users as u ON u.id = v.voter_id WHERE v.election_id = $election_id AND u.age BETWEEN '31' AND '50' GROUP BY v.participant_id");


              $tp_total = DB::SELECT( "SELECT COUNT(vote.id) as total FROM vote INNER JOIN users ON vote.voter_id = users.id WHERE vote.election_id = $election_id AND users.age BETWEEN '31' AND '50' ");

            
              $tp_total = $tp_total[0]->total;



            if(empty( $thirtyPlus ) ){

            
            $thirty = []; 


            }else{  


              
               foreach ($thirtyPlus as $thirty) {
               
               $thirtyCand[] = $thirty;
            }

          
            foreach ($thirtyCand as  $tc) {


                $thirtyVote[] = $tc->votes;

            }
            
            
            
            foreach ($thirtyVote as  $tv) {


              $thirtyPer[] =  round( ( $tv / $tp_total ) * 100 );

            }
            

          
            $thirty  = [ 'thirtyCand' => $thirtyCand, 'thirtyPer' =>$thirtyPer ];

           
             }
           
           // return $thirty;   


            //AGE ABOVE 50


              $fiftyPlus  = DB::SELECT( "SELECT v.election_id, e.title, COUNT(v.id) AS votes, v.participant_id, pg.title as participant_name, u.age FROM vote as v INNER JOIN participants as p ON p.id = v.participant_id INNER JOIN political_groups as pg ON pg.id = p.political_group_id INNER JOIN election AS e ON e.id = v.election_id INNER JOIN users as u ON u.id = v.voter_id WHERE v.election_id = $election_id AND (YEAR(CURRENT_TIMESTAMP) - YEAR(dob) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(dob, 5))) >= '51' GROUP BY v.participant_id" );

              $ftp_total = DB::SELECT( "SELECT COUNT(vote.id) as total FROM vote INNER JOIN users ON vote.voter_id = users.id WHERE vote.election_id = $election_id AND (YEAR(CURRENT_TIMESTAMP) - YEAR(dob) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(dob, 5))) >= '51' ");

            
              $ftp_total = $ftp_total[0]->total;

              if( empty( $fiftyPlus ) ){

            
              $fifty = []; 


            }else{


            foreach ($fiftyPlus as $fifty) {
               
               $fiftyCand[] = $fifty;
            }

          
            foreach ($fiftyCand as  $fc) {


                $fiftyVote[] = $fc->votes;

            }
            
            
            
            foreach ($fiftyVote as  $fv) {


              $fiftyPer[] =  round( ( $fv / $ftp_total ) * 100 );

            }
            

          
            $fifty  = [ 'fiftyCand' => $fiftyCand, 'fiftyPer' =>$fiftyPer ];  

          
          }


            //VOTER TURNOUT


             $totalUsers = User::where('role','user')->get()->count(); // 325
             
             $voters     = vote::where( 'election_id', $election_id )->get()->count();

            

             $percentage = ( $voters / $totalUsers ) * 100;


            $voteCasted =  round( $percentage ); 

            
            $notCasted =  100 - $voteCasted ; 
            


            $trunout  = [ 'voteCasted' => $voteCasted, 'notCasted' => $notCasted ];


           

            // GENDER TROUNOUT

            //SELECT COUNT(u.age) as eighteen FROM users as u INNER JOIN vote AS v ON u.id = v.voter_id WHERE u.age BETWEEN 18 AND 30 AND v.election_id = 91

            $totalGenders =  DB::SELECT( "SELECT COUNT(vote.id) as total FROM vote WHERE vote.election_id = ".$election_id);

            $gender_male =  DB::SELECT( "SELECT COUNT(u.gender) as male FROM users as u INNER JOIN vote as v ON u.id = v.voter_id WHERE u.gender = 'MALE' AND v.election_id = ".$election_id );

            $gender_female =  DB::SELECT( "SELECT COUNT(u.gender) as female FROM users as u INNER JOIN vote as v ON u.id = v.voter_id WHERE u.gender = 'FEMALE' AND v.election_id = ".$election_id );

            $gender_not_disclosed =  DB::SELECT( "SELECT COUNT(u.gender) as not_disclosed FROM users as u INNER JOIN vote as v ON v.voter_id = u.id WHERE u.gender = 'NOT DISCLOSED' AND v.election_id = ".$election_id );

            $age_eighteen =  DB::SELECT( "SELECT COUNT(u.age) as eighteen FROM users as u INNER JOIN vote AS v ON u.id = v.voter_id WHERE (YEAR(CURRENT_TIMESTAMP) - YEAR(dob) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(dob, 5))) BETWEEN '18' AND '30' AND v.election_id = ".$election_id );

           $age_thirty =  DB::SELECT( "SELECT COUNT(u.age) as thirty FROM users as u INNER JOIN vote as v ON u.id = v.voter_id WHERE (YEAR(CURRENT_TIMESTAMP) - YEAR(dob) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(dob, 5))) BETWEEN '31' AND '50' AND v.election_id = ".$election_id );

           $age_fifty =  DB::SELECT( "SELECT COUNT(u.age) as fifty FROM users as u INNER JOIN vote as v ON u.id = v.voter_id WHERE (YEAR(CURRENT_TIMESTAMP) - YEAR(dob) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(dob, 5))) >= '51' AND v.election_id = ".$election_id );


            $data = [
              'age_eighteen'  => $age_eighteen,
              'age_thirty'    => $age_thirty,
              'age_fifty'     => $age_fifty
            ];

            // $me = "";
            // $me .= "<br>".$gender_male[0]->male;
            // $me .= "<br>".$gender_female[0]->female;
            // $me .= "<br>".$totalGenders[0]->total;
            // echo $me;exit;die();
            
            if( $totalGenders[0]->total == 0 )
            {
              $perMale = 0;
              $perFemale = 0;
              $perND = 0;
              $perEighteen = 0;
              $perThirty = 0;
              $perFifty = 0;
            }
            else
            {
              $perMale = round( ( $gender_male[0]->male / $totalGenders[0]->total ) * 100 );
              $perFemale = round( ( $gender_female[0]->female / $totalGenders[0]->total ) * 100 );
              $perND =  round( ( $gender_not_disclosed[0]->not_disclosed / $totalGenders[0]->total ) * 100 );
              $perEighteen = round( ( $age_eighteen[0]->eighteen / $totalGenders[0]->total ) * 100 );
              $perThirty = round( ( $age_thirty[0]->thirty / $totalGenders[0]->total ) * 100 );
              $perFifty = round( ( $age_fifty[0]->fifty / $totalGenders[0]->total ) * 100 );
            }



           // return $gender_male[0]->male;

            $genders  = [ 
              'gender_male' => $perMale,
              'gender_female' => $perFemale, 
              'gender_not_disclosed' => $perND
            ];

            // AGE TROUNOUT

            $totalGenders =  DB::SELECT( "SELECT COUNT(vote.id) as total FROM vote WHERE vote.election_id = ".$election_id);

            $ages  = [ 
              'age_eighteen' => $perEighteen,
              'age_thirty' => $perThirty, 
              'age_fifty' => $perFifty
            ];


            $data = [ 
              'overallData' => $overall,
              'males' => $males,
              'females' => $females, 
              'election_title' => $election_title,
              'not_disclosed' => $not_disclosed,
              'eighteen'    => $eighteen,
              'thirty' => $thirty,
              'fifty'     => $fifty, 
              'trunout'  => $trunout,
              'genders'     => $genders, 
              'ages'   => $ages,
              'winner'     => $winner  
            ];


             return view( 'admin.reports.index', $data );

         }           
    }

}

