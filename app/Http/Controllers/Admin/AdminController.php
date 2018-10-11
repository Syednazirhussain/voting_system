<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Auth;

use Session;

use DB;

use Flash;

use App\User;


use App\Models\Election;

use App\Models\PoliticalGroup;

use App\Models\Participant;
use App\Models\vote;


class AdminController extends Controller
{
    

    public function __construct()
    {
        
    }

    public function hello()
    {

        echo "hello world";
        exit;

    }


    public function adminLogin()
    {

    	return view( 'admin.login' );
    }


    public function authenticate( Request $request )
    {
        $email =  $request->email;
        $password =  $request->password;

        // dd($email);


        $this->validate($request, [

                'email' => 'required|email',
                'password' => 'required|string|min:6|max:20',
        ]);


        //return $request->all();

        if( Auth::guard('admin')->attempt( ['email' => $email, 'password' => $password, 'role'=>'admin' ] ) ) {


           


             return redirect()->route( 'admin.dashboard' );
                
        } 

        //  $success = 0;
        //  $role = 'Invalid Username or Password';
         
        // return response()->json( ['success' => $success, 'role' => $role] ) ;

        return redirect()->route( 'admin.login' )->with( 'message', 'Invalid Username or Password' );
    }


    public function logout(Request $request)
    {


        if(Auth::guard('admin')->check()) 
        {

            $request->session()->flush();
            Auth::guard('admin')->logout();
            

        
       return redirect()->route( 'admin.login' );
        
        
            
        }else{

       return redirect()->route( 'admin.login' );
            
        }   

    }

    public function signup()
    {
    	return view( 'admin.user.signup' );
    }

     public function signup_process( Request $request  )
    {
        //return $request->all();

        $this->validate($request,[
            'name' => 'required|max:100|min:3|',
            'ssn'  => 'required',
            'mobile_no'  => 'required|max:11|numeric',
            
            'email'  => 'required|unique:users,email',
            'password'  => 'required|max:20|min:6'
        ]);
       
        $data[ 'name' ]      = $request->name;
        $data[ 'email' ]     = $request->email;
        $data[ 'password' ]  = bcrypt( $request->password );
        $data[ 'mobile_no' ] = $request->mobile_no;
        $data[ 'ssn' ]       = $request->ssn;
        $data[ 'status' ]    = 'active';
        $data[ 'role' ]      =  'user';

       
         User::create( $data );

         
        return redirect()->route( 'admin.login' )->with( 'message', 'User Created Successfully' );
    }


    public function verifyEmail(Request $request)
    {   


         $email =  User::where('email', $request->email)->get();
         
       
        if ( count($email) > 0) {
            $success = 0;
            $response = 401;
        } else {
            $success = 1;
            $response = 200;
        }

        return response()->json(['success'=> $success, 'code'=>$response]);
    }

     public function verifyElectionParticipant(Request $request)
    {   

        $ids =  $request->election_participant_ids;
        

        $ids = implode(',', $ids);

        return $ids;
        // return $ids;
        
         $exists =  Election::where('email', $request->email)->get();
         
       
        // if ( count($email) > 0) {
        //     $success = 0;
        //     $response = 401;
        // } else {
        //     $success = 1;
        //     $response = 200;
        // }

        // return response()->json(['success'=> $success, 'code'=>$response]);
    }

     public function verifySsn(Request $request)
    {   

        $input = str_replace("-", "", $request->ssn);

        $ssn =  User::where('ssn', $input)->get();
         
       
        if ( count($ssn) > 0) {
            $success = 0;
            $response = 401;
        } else {
            $success = 1;
            $response = 200;
        }

        return response()->json(['success'=> $success, 'code'=>$response]);
    }


    public function verifyPhone(Request $request)
    {   
        
        $input = str_replace("-", "", $request->mobile_no);
        
        $phone =  User::where('mobile_no', $input)->get();     
        
         
       
        if ( count($phone) > 0) {
            $success = 0;
            $response = 401;
        } else {
            $success = 1;
            $response = 200;
        }

        return response()->json(['success'=> $success, 'code'=>$response]);
    }

    



    

    // public function viewusers()
    // {
    // 	return view( 'admin.user.view-users' );
    // }

    // public function addusers()
    // {
    // 	return view( 'admin.user.add-users' );
    // }


    public function editProfile(Request $request )
    {
        $data = User::where( 'id', $request->id)->get();

        return view( 'admin.user.edit_profile', ['user' => $data]  );
    }



    public function updateProfile(Request $request)
    {
        $this->validate( $request, [
            'name' => 'required',
            'ssn'  => 'required',
            'mobile_no'  => 'required',
            
            //'email'  => 'required|unique:users,email',
            'password'  => 'nullable|max:20|min:6'

        ] );

        
            $data[ 'name' ]      = $request->name;
            $data[ 'ssn'  ]      = $request->ssn;
            $data[ 'mobile_no' ] = $request->mobile_no;


            $data['mobile_no'] = str_replace("-", "", $data['mobile_no']);

            $data['ssn'] = str_replace("-", "", $data['ssn']);
            
            //$data[ 'email'     ] = $request->email;
            
            if( !empty($request->password) )
            {    
                $data[ 'password'  ] = bcrypt( $request->password );
            }


            $result = User::where( 'id', $request->id )->update( $data );


            if( $result ) {

                return redirect()->back()->with( 'message', 'Account Settings Updated Successfully' );
            }

            //return $data;
                return redirect()->back()->with( 'message', 'Account Settings Not Updated' );

    
    }



        



     



       


}
