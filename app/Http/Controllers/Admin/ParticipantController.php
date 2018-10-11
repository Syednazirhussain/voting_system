<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateParticipantRequest;
use App\Http\Requests\Admin\UpdateParticipantRequest;
use App\Repositories\ParticipantRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\Models\Participant;
use App\Models\PoliticalGroup;

use App\User;

class ParticipantController extends Controller
{
    /** @var  ParticipantRepository */
    private $participantRepository;

    public function __construct(ParticipantRepository $participantRepo)
    {
        $this->participantRepository = $participantRepo;
    }

    /**
     * Display a listing of the Participant.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->participantRepository->pushCriteria(new RequestCriteria($request));
        $participants = $this->participantRepository->all();

        $pg = PoliticalGroup::all();

        return view('admin.participants.index', [ 'participants' => $participants, 'politicalGroups' => $pg] );
    }

    /**
     * Show the form for creating a new Participant.
     *
     * @return Response
     */
    public function create()
    {   
        
        $pg = PoliticalGroup::all();

        return view('admin.participants.create', ['politicalGroups' => $pg]);
    }

    /**
     * Store a newly created Participant in storage.
     *
     * @param CreateParticipantRequest $request
     *
     * @return Response
     */
    public function store(CreateParticipantRequest $request)
    {

        $this->validate( $request, [

            'name'                  => 'required | max:100 | min: 3 ',
           //  'age'                   => 'numeric  | required',
           //  'mobile_no'             => 'required ',
           //  'email'                 => 'required ',
           // // 'password'              => 'nullable|max:20|min:6',
           //  'ssn'                   => 'required', 
            'political_group_id'    => 'required',

        ] );

        

        $data['name'] = $request->name;
        // $data['email'] = $request->email;
        // $data['mobile_no'] = $request->mobile_no;
        // $data['ssn'] = $request->ssn;
        $data['political_group_id'] = $request->political_group_id;

        // $data['mobile_no'] = str_replace("-", "", $data['mobile_no']);

        // $data['ssn'] = str_replace("-", "", $data['ssn']);


        //User::create( $data );

        //$data['age'] = $request->age;

        $participant = $this->participantRepository->create($data);


        
        
        Flash::success('Participant saved successfully.');

        return redirect(route('admin.participants.index'));
    }

    /**
     * Display the specified Participant.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $participant = $this->participantRepository->findWithoutFail($id);

        if (empty($participant)) {
            Flash::error('Participant not found');

            return redirect(route('admin.participants.index'));
        }

        return view('admin.participants.show')->with('participant', $participant);
    }

    /**
     * Show the form for editing the specified Participant.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $participant = $this->participantRepository->findWithoutFail($id);

        $pg = PoliticalGroup::all();

        if (empty($participant)) {
            Flash::error('Participant not found');

            return redirect(route('admin.participants.index'));
        }

        return view('admin.participants.edit', ['politicalGroups' => $pg, 'participant' => $participant ] );
    }

    /**
     * Update the specified Participant in storage.
     *
     * @param  int              $id
     * @param UpdateParticipantRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParticipantRequest $request)
    {


        $participant = $this->participantRepository->findWithoutFail($id);
        

        $this->validate( $request, [

            'name'                  => 'required | max:100 | min: 3 ',
            // 'age'                   => 'numeric',
            // 'mobile_no'             => 'required  ',
            // 'email'                 => 'required ',
            // //'password'              => 'nullable|max:20|min:6',
            // 'ssn'                   => 'required', 
            'political_group_id'    => 'required',


        ] );

            $data['name'] = $request->name;
            
            $data['political_group_id'] = $request->political_group_id;

            // $data['mobile_no'] = str_replace("-", "", $data['mobile_no']);

            // $data['ssn'] = str_replace("-", "", $data['ssn']);

            // unset( $data['_method'] );
            // unset( $data['_token'] );
            // //unset( $data['ssn'] );

            // if( !empty($request->password) )
            // {    
            //     $data[ 'password'  ] = bcrypt( $request->password );
            // }else{

            //     unset( $data['password'] );

            // }


           

        if (empty($participant)) {
            Flash::error('Participant not found');

            return redirect(route('admin.participants.index'));
        }

        $participant = $this->participantRepository->update($data, $id);

        Flash::success('Participant updated successfully.');

        return redirect(route('admin.participants.index'));
    }

    /**
     * Remove the specified Participant from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $participant = $this->participantRepository->findWithoutFail($id);

        if (empty($participant)) {
            Flash::error('Participant not found');

            return redirect(route('admin.participants.index'));
        }

        $this->participantRepository->delete($id);

        Flash::success('Participant deleted successfully.');

        return redirect(route('admin.participants.index'));
    }


    public function verify_candidate_email(Request $request)
    {   
        
        //$participantEmail = $request->email;

        $email =  Participant::where('email', $request->email)->get();     
        
         
       
        if ( count($email) > 0) {
            $success = 0;
            $response = 401;
        } else {
            $success = 1;
            $response = 200;
        }

        return response()->json(['success'=> $success, 'code'=>$response]);
    }



    public function verifyCandidateSsn(Request $request)
    {   


         $ssn =  Participant::where('ssn', $request->ssn)->get();
         
       
        if ( count($ssn) > 0) {
            $success = 0;
            $response = 401;
        } else {
            $success = 1;
            $response = 200;
        }

        return response()->json(['success'=> $success, 'code'=>$response]);
    }
}
