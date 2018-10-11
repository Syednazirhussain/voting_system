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


class DashboardController extends Controller
{

    public function hello()
    {

        echo "hello world";
        exit;

    }
    

    public function index()
    {

       

        $elections = Election::all();
        
        $users = User::where('role','user')->get()->count();
        
        $politicalGroups = PoliticalGroup::all()->count();

        $participants = Participant::all()->count();


        $election_count  = $elections->count();

        //return $elections;
        

        return view( 'admin.dashboard.index' , ['elections' => $elections, 'users' => $users, 'politicalGroups' => $politicalGroups,
                                               'participants' => $participants, 'election_count' => $election_count ] );
    }

}
