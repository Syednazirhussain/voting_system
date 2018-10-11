<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){

		return redirect()->route('welcome');

});

//Admin Login Authenticate
Route::post('admin/hello', ['as' => 'admin.hello', 'uses' => 'Admin\DashboardController@hello']);


// Admin Login View
Route::get('admin/login', ['as'=> 'admin.login', 'uses' => 'Admin\AdminController@adminLogin']);

// Admin Email Exists Check
Route::post('admin/verify/email', ['as'=> 'admin.verify.email', 'uses' => 'Admin\AdminController@verifyEmail']);


// Admin Election Participant Exists Check
Route::post('admin/verify/election_participant', ['as'=> 'admin.verify.election_participant', 'uses' 
									   => 'Admin\AdminController@verifyElectionParticipant']);


// Admin Phone Exists Check
Route::post('admin/verify/phone', ['as'=> 'admin.verify.phone', 'uses' => 'Admin\AdminController@verifyPhone']);

// Admin SSN Exists Check
Route::post('admin/verify/ssn', ['as'=> 'admin.verify.ssn', 'uses' => 'Admin\AdminController@verifySsn']);

//Admin Login Authenticate
Route::post('admin/authenticate', ['as' => 'admin.authenticate', 'uses' => 'Admin\AdminController@authenticate']);










//AUTH MIDDLEWARE

Route::group(['middleware' => 'admin.auth'], function() {

	# Admin Account related routes

	// Admin Logout 
	Route::get('admin/logout', ['as'=> 'admin.logout', 'uses' => 'Admin\AdminController@logout']);	

	// Admin View Dashboard
	Route::get('admin/dashboard', ['as'=>'admin.dashboard', 'uses' => 'Admin\DashboardController@index']);

	// Admin View Reports
	Route::get('admin/reports/{id}', ['as'=>'admin.reports', 'uses' => 'Admin\ReportController@index']);



	// Admin Account Settings
	Route::get('admin/edit/profile', ['as'=>'admin.edit.profile', 'uses' => 'Admin\AdminController@editProfile']);

	// Admin UPDATE Account Settings
	Route::post('admin/update/profile', ['as'=>'admin.update.profile', 'uses' => 'Admin\AdminController@updateProfile']);


	//VOter CRUD

	// Admin Create Voter

	Route::get('admin/voter/create', ['as'=>'admin.voter.create', 	'uses' => 'Admin\VoterController@create']);

	// Admin Store Voter
	Route::post('admin/voter/store', ['as'=>'admin.voter.store', 	'uses' => 'Admin\VoterController@store']);


	// Admin View Voters
	Route::get('admin/voter/', 		 ['as'=>'admin.voter.index', 	'uses' => 'Admin\VoterController@index']);

	// Admin Edit Voter View
	Route::get('admin/voter/edit/{id}', ['as'=>'admin.voter.edit', 	'uses' => 'Admin\VoterController@edit']);

	// Admin Update Voter
	Route::post('admin/voter/update', 	['as'=>'admin.voter.update', 'uses' => 'Admin\VoterController@update']);

	// Admin Voter Delete
	Route::delete('admin/voter/{id}', ['as'=> 'admin.voter.destroy', 'uses' => 'Admin\VoterController@destroy']);


	//Elections

	//Route::resource('elections', 'Admin\ElectionController');


	// Admin Elections View
	Route::get('admin/elections', ['as'=> 'admin.elections.index', 'uses' => 'Admin\ElectionController@index']);

	// Admin Create Election
	Route::get('admin/election/create', ['as'=> 'admin.election.create', 'uses' => 'Admin\ElectionController@create']);


	// Admin Store Election 
	Route::post('admin/election', ['as'=> 'admin.election.store', 'uses' => 'Admin\ElectionController@store']);



	// Admin Delete Participant

	Route::delete('admin/election/{election}', ['as'=> 'admin.election.destroy', 'uses' => 'Admin\ElectionController@destroy']);

	// Admin Edit Participant
	Route::put('admin/election/{election}', ['as'=> 'admin.election.update', 'uses' => 'Admin\ElectionController@update']);

	// Admin Update Participant 

	Route::patch('admin/election/{election}', ['as'=> 'admin.participants.update', 'uses' => 'Admin\ElectionController@update']);


	// Admin Edit Participant View
	Route::get('admin/eletions/{election}/edit', ['as'=> 'admin.election.edit', 'uses' => 'Admin\ElectionController@edit']);



	// Admin End Active Election Time

	Route::get( 'admin/election/end_election/{election_id}', ['as'=> 'admin.election.end_election', 
				'uses' => 'Admin\ElectionController@endElection' ] );



	// Admin Assign Participants to Election View
	Route::get('admin/election/assign_participants/{id}', ['as'=> 'admin.election.assignParticipants', 'uses' => 'Admin\ElectionController@assignParticipants']);

	// Admin Store Participants to Election 
	Route::post('admin/election/store_participants', ['as'=> 'admin.election.storeParticipants', 'uses' => 'Admin\ElectionController@storeParticipants']);


	//Participants


	// Admin Participants View
	Route::get('admin/participants', ['as'=> 'admin.participants.index', 'uses' => 'Admin\ParticipantController@index']);

	// Admin Store Participants 
	Route::post('admin/participants', ['as'=> 'admin.participants.store', 'uses' => 'Admin\ParticipantController@store']);

	// Admin Create Participants
	Route::get('admin/participants/create', ['as'=> 'admin.participants.create', 'uses' => 'Admin\ParticipantController@create']);

	// Admin Edit Participant
	Route::put('admin/participants/{participants}', ['as'=> 'admin.participants.update', 'uses' => 'Admin\ParticipantController@update']);

	// Admin Update Participant 

	Route::patch('admin/participants/{participants}', ['as'=> 'admin.participants.update', 'uses' => 'Admin\ParticipantController@update']);

	// Admin Delete Participant

	Route::delete('admin/participants/{participants}', ['as'=> 'admin.participants.destroy', 'uses' => 'Admin\ParticipantController@destroy']);

	// Admin Edit Participant View
	Route::get('admin/participants/{participants}/edit', ['as'=> 'admin.participants.edit', 'uses' => 'Admin\ParticipantController@edit']);



	// Admin View Political Groups
	Route::get('admin/political_groups', ['as'=> 'admin.politicalGroups.index', 'uses' => 'Admin\PoliticalGroupController@index']);

	// Admin Store Political Group
	Route::post('admin/political_groups', ['as'=> 'admin.politicalGroups.store', 'uses' => 'Admin\PoliticalGroupController@store']);


	// Admin Create Political Group
	Route::get('admin/political_groups/create', ['as'=> 'admin.politicalGroups.create', 'uses' => 'Admin\PoliticalGroupController@create']);

	// Admin Edit Political Group
	Route::put('admin/political_groups/{politicalGroups}', ['as'=> 'admin.politicalGroups.update', 'uses' => 'Admin\PoliticalGroupController@update']);


	// Admin Update Political Group
	Route::patch('admin/political_groups/{politicalGroups}', ['as'=> 'admin.politicalGroups.update', 'uses' => 'Admin\PoliticalGroupController@update']);

	// Admin Delete Political Group
	Route::delete('admin/political_groups/{politicalGroups}', ['as'=> 'admin.politicalGroups.destroy', 'uses' => 'Admin\PoliticalGroupController@destroy']);

	// Admin Edit Political Group View
	Route::get('admin/political_groups/{politicalGroups}/edit', ['as'=> 'admin.politicalGroups.edit', 'uses' => 'Admin\PoliticalGroupController@edit']);


 });   //Middleware Auth














// Voter Basic Routes

// Voter Login
Route::get('voter/login', ['as'=> 'voter.login', 'uses' => 'Voter\VoterLoginController@voterLogin']);

// Voter Authentication

Route::post('voter/authenticate', ['as'=> 'voter.authenticate', 'uses' => 'Voter\VoterLoginController@authenticate']);


// Voter Phone Authentication Code Generation
Route::post('voter/otp/parameters', ['as'=> 'voter.otp.parameters', 'uses' => 'Voter\VoterLoginController@otpParameters']);

// Voter Email Authentication Code Generation
Route::post('voter/otp/email', ['as'=> 'voter.otp.email', 'uses' => 'Voter\VoterLoginController@otpEmail']);

// Voter Email Authentication Code RESET
Route::post('voter/reset/otp', ['as'=> 'voter.reset.otp', 'uses' => 'Voter\VoterLoginController@resetOtp']);

// Voter Email Authentication Code Verification
Route::post('voter/verify/otp_by_email', ['as'=> 'voter.verify.otp_by_email', 
			'uses' => 'Voter\VoterLoginController@verifyOtpByEmail']);

// Voter Phone Authentication Code Verification
Route::post('voter/verify/otp_by_phone', ['as'=> 'voter.verify.otp_by_phone', 
			'uses' => 'Voter\VoterLoginController@verifyOtpByPhone']);



//Voter Middleware
Route::group(['middleware' => 'voter'], function() { 


	//Voter Dashboard

	Route::get('voter/dashboard', ['as'=>'voter.dashboard', 'uses' => 'Voter\VoterDashboardController@index']);

	//Voter Elections Listing
	Route::get('voter/election/vote', ['as'=>'voter.election.vote', 'uses' => 'Voter\VoterElectingController@electionVote']);

	//Voter Vote Casting 
	Route::post('voter/vote/cast', ['as'=>'voter.vote.cast', 'uses' => 'Voter\VoterElectingController@voteCast']);

	//Voter Logout
	Route::get('voter/logout', ['as'=> 'voter.logout', 'uses' => 'Voter\VoterLoginController@logout']);


});   //Middleware Voter