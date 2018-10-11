<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;
use DB;
use Flash;
use Mail;

use App\Models\Election;
use App\Models\PoliticalGroup;
use App\Models\Participant;
use App\Models\vote;

class VoterController extends Controller{

    public function create()

        {

            return view( 'admin.voters.create' );

        }





    public function index()

    {

        $users =  User::where( 'role','user' )->get();

    

        return view( 'admin.voters.index', ['users' => $users ] );

    }











       public function store(Request $request)

        {



          $today = date( 'F d, Y  H:m:s');        

          $week  = date( 'F d, Y  H:m:s', strtotime("+1 week"));  

        

        $this->validate($request,[



                    'name'       => 'required|max:100|min:3|',

                    'ssn'        => 'required|unique:users,ssn',

                    'mobile_no'  => 'required',

                    'dob'        =>  'required',

                    'gender'     =>  'required',

                    'street1'    =>  'required',

                    'city'       =>  'required',

                    'zipcode'    =>  'required',

                    'state'      =>  'required',   

                    'email'      => 'required|unique:users,email',

                    //'password'  => 'required|max:20|min:6'

        

        ]);



        // return $request->all();

       

        $data[ 'name' ]         =  $request->name;

        $data[ 'email' ]        =  $request->email;



        $data[ 'gender' ]       =  $request->gender;

        $data[ 'street_one' ]   =  $request->street1;

        $data[ 'street_two' ]   =  ( $request->street2 )?$request->street2:'';

        $data[ 'city' ]         =  $request->city;

        $data[ 'state' ]        =  $request->state;

        $data[ 'zipcode' ]      =  $request->zipcode;



        //$data[ 'password' ]  = bcrypt( $request->password );

        $data[ 'mobile_no' ] = str_replace("-", "", $request->mobile_no);

        $data[ 'ssn' ]       =  str_replace("-", "", $request->ssn);

        $data[ 'status' ]    = 'active';

        $data[ 'role' ]      =  'user';

        $data['dob'] = $request->dob;


        $dob = explode("-", $data['dob']);
        $born_year = $dob[count($dob)-1];
        $current_year = date('Y',strtotime(date('m-d-Y')));
        $age =  $current_year -  $born_year;

        $data[ 'age' ] = $age;

        $dateArr = explode("-", $data['dob']); 

        if(count($dateArr) == 3)
        {
            $dateOfBirth = $dateArr[2]."-".$dateArr[0]."-".$dateArr[1];
        }

        $data['dob'] = $dateOfBirth;
      

        $result =  User::create( $data );

         if($result)

          {



            $parameters  = [ 'email' => $data['email'], 'start' => $today, 'end' => $week ];

        

        //Acknowledgement Email



         Mail::send('email_templates.voter_acknowledgement' , $parameters, function($message) use( $parameters ) {

            

             $message->to($parameters['email'])->subject

                ('Acknowledgement');

             

         });





         //Acknowledgement Message



            $ch = curl_init('https://textbelt.com/text');

            $data = array(

             

              'phone' => $data['mobile_no'],

              

              'message' => 'You have been registered to vote in the upcoming US Presidential elections being held between 10/04/2018 10:00 AM and 10/06/2018 10:00 PM',

              

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





          }  





            Flash::success('Voter added successfully.');



            return redirect(route('admin.voter.index'));





        }





        





        public function edit( $id )
        {
            $user = User::where( 'id', $id )->first();


            $dateArr = explode("-", $user->dob);

            $data =  [
                'user' => $user,
                'id'   => $id
            ];
            
            if(count($dateArr) == 3)
            {
                $dateOfBirth = $dateArr[1]."-".$dateArr[2]."-".$dateArr[0];

                $data['dob'] = $dateOfBirth;
            }

            return view( 'admin.voters.edit', $data);
        } 





        public function update( Request $request )

        {

            $this->validate( $request, [

            'name' => 'required|max:100|min:3',

            'ssn'  => 'required',

            'mobile_no'  => 'required',

           

            'password'  => 'nullable|max:20|min:6',

            'dob'        =>  'required',

            'gender'     =>  'required',

            'street1'    =>  'required',

            'city'       =>  'required',

            'zipcode'    =>  'required',

            'state'      =>  'required', 



        ] );



        

            $data[ 'name' ]      = $request->name;

            $data[ 'ssn'  ]      = $request->ssn;

            $data[ 'mobile_no' ] = $request->mobile_no;

            $data[ 'age' ]          =  $request->age;

            $data[ 'gender' ]       =  $request->gender;

            $data[ 'street_one' ]   =  $request->street1;

            $data[ 'street_two' ]   =  ( $request->street2 )?$request->street2:'';

            $data[ 'city' ]         =  $request->city;

            $data[ 'state' ]        =  $request->state;

            $data[ 'zipcode' ]      =  $request->zipcode;

            $data['mobile_no'] = str_replace("-", "", $data['mobile_no']);

            $data['ssn'] = str_replace("-", "", $data['ssn']);

            $data['dob'] = $request->dob;

            $dob = explode("-", $data['dob']);
            $born_year = $dob[count($dob)-1];
            $current_year = date('Y',strtotime(date('m-d-Y')));
            $age =  $current_year -  $born_year;

            $data[ 'age' ] = $age;

            $dateArr = explode("-", $data['dob']); 

            if(count($dateArr) == 3)
            {
                $dateOfBirth = $dateArr[2]."-".$dateArr[0]."-".$dateArr[1];
            }

            $data['dob'] = $dateOfBirth;

            if( !empty($request->password) )

            {    

                $data[ 'password'  ] = bcrypt( $request->password );

            }



            //dd($request->id);



             User::where( 'id', $request->id )->update( $data );



            Flash::success('Voter updated successfully.');



                return redirect( route('admin.voter.index'));

        }    





















    public function destroy( Request $request,$id )

        {   

               $user = User::find($id);

               

              



                if (empty($user)) {

                    Flash::error('Voter not found');



                    return redirect(route('admin.voter.index'));

                }



                User::find( $id )->delete();



                Flash::success('Voter deleted successfully.');



                return redirect( route('admin.voter.index'));



               

               

              

        }









}

