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



class VoterLoginController extends Controller

{













    public function voterLogin(Request $request)

    {   



        if( !Auth::guard('voter')->check() ){



        return view( 'voter.auth.login' );



            

        }else{





        return redirect()->route('voter.dashboard');

            

        }

       



       

    }









 public function authenticate( Request $request )
 {


        $this->validate($request, [



                'email' => 'required|email',

                //'password' => 'required|string|min:6|max:20',

                'ssn'   => 'required',

                'mobile_no'   => 'required',

        ]);



        $email =  $request->email;

        $ssn    = str_replace("-", "", $request->ssn);

        $phone  = str_replace("-", "", $request->mobile_no);

        $user = User::where( 'email', $email )->where( 'ssn', $ssn )->where( 'mobile_no', $phone )->first();





        if( $user ) {

             $success   = 1;

             $phone     = $user->mobile_no;

             $email     = $user->email;

             $ssn       = $user->ssn;

             $uid       = $user->id;



             $data      = ['userId'=>$uid, 'ssn' => $ssn];



            $view       = view('voter.auth.verification_form',$data);

            

            $content    = $view->render();



            return response()->json( ['success' => $success, 'message' => 'User Authenticated',  

                                      'phone' => $phone, 'email' => $email, 'ssn' => $ssn, 

                                      'uid' => $uid, 'pageContent' => $content] ) ;



        

             

                

        } 



         $success = 0;

         $message = 'Invalid Credentials';

         

        return response()->json( ['success' => $success, 'message' => $message ] ) ;



       // return redirect()->route( 'login' )->with( 'message', 'Invalid Username or Password' );

    }



    //OTP BY PHONE



    public function otpParameters( Request $request)

    {

        $phone =  $request->phone;
        $ssn   =  $request->ssn;
        $userId = $request->userId;

        $data = [
          'phone'   => $phone,
          'userid'  => $ssn,
          'key'     => '9b0ce7bf76e864c1d27985d952ef8536fe2c94ea7hPTcVTJKLUZrI3KCn0mNhM0e',
          'lifetime'=> '300'
        ];

        $ch = curl_init('https://textbelt.com/otp/generate');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);


        $userData = [
            'userId'    =>  $userId,
            'ssn' => $ssn,
            'method' => 'phone'
        ];

        $view    =  view('voter.auth.ajax_verify_form',$userData);

        $content    = $view->render();

        $response = json_decode($response,1);

        if($response['success'] != 0)
        {
            return response()->json( ['success' => 1, 'content' => $content, 'response' => $response ] ) ;                            
        }

    }

    public function otpEmail(Request $request)
    {   

        $email  = $request->email;
        $token  = $request->token;
        $userId = $request->userId;
        $ssn    = $request->ssn;

        $data  = [ 
            'user' => $email,
            'token' => $token,
            'userId' =>$userId 
        ];

        Mail::send('voter.auth.send' , $data, function($message) use( $data ) {
             $message->to($data['user'])->subject('OTP CODE -- E VOTING SYSTEM');
        }); 

        if( !Mail::failures() ) 
        {

            $tokenUpdate = User::where('id',$userId)->update(['otp_token' => $token]);

            if($tokenUpdate)
            {
                $success = 1;
                $message = 'Mail Sent';
                $userData      = ['userId'=>$userId, 'ssn' => $ssn, 'method' => 'email'];
                $view    =  view('voter.auth.ajax_verify_form',$userData);
                $content = $view->render();
                return response()->json( ['success' => $success, 'message' => $message, 'content' => $content ] ) ;
            }

        }
        else
        {

            $success = 0;
            $message = 'Something went wrong';
            return response()->json( ['success' => $success, 'message' => $message ] ) ;
        }
    }



    //OTP BY EMAIL





    //OTP VERIFICATION BY EMAIL CODE



    public function verifyOtpByEmail(Request $request)

    {

         

         $otp =  $request->userCode;   

         $id  =  $request->userId; 



         //return $request->all();



         $result =  User::where('id',$id)->where('otp_token',$otp)->get()->count();







          // return $result;



         if( $result )

         {

            $result =  User::where('id',$id)->update( [ 'otp_token' => null ] );



           if( $result )

           {   

             Auth::guard('voter')->loginUsingId($id);

             return 1;

           }





        }else{



            return 0;

        }



        

           

    }







    public function verifyOtpByPhone(Request $request)

    {

         

        

         $id  =  $request->id; 





        $user = User::where( 'id', $id )->first();





       if( $user )

       {   

          Auth::guard('voter')->loginUsingId($id);



          //return redirect()->route( 'voter.dashboard' );

       }





       return 0;

           

    }





    //RESET OTP IN DB



    public function resetOtp(Request $request)

    {

        

        $id = $request->id;

    

       $result =  User::where('id',$id)->update( [ 'otp_token' => null ] );



       if( $result )

       {

         return "success";

       }



       return "fail";



    }



 public function logout()

    {

        session()->flush();



        Auth::guard('voter')->logout();

        

        return redirect()->route( 'voter.login' );

    }









   

}







  