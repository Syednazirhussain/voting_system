
@extends( 'admin.default' )

@section( 'content' )

    
   

     <div class="px-content">
        <div class="page-header">
           
            <h1><span class="text-muted font-weight-light"><i class="ionicons ion-person-stalker"></i>&nbsp;&nbsp;Election / </span>Add Participants</h1>
        </div>

         @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
        @endif

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Add Participants </div>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'admin.election.storeParticipants', 'id' => 'validation-form' ]) !!}

                        <input type="hidden" name="id" value="{{ $election_id }}">

                        <div class="row">
                        <!-- Candidate Id Field -->
						<div class="form-group col-sm-12">
						   

						    {!! Form::label('election_participant_ids', 'Participants') !!}
							<select id="election_participant_ids" name="election_participant_ids[]" class="form-control select2-example" multiple>
									


									<option value="" >Select Participant</option>
								
									@foreach( $participants as $participant )
										

									 <option value="{{ $participant->id }}"
									 		
                                        <?php
                                            if( isset( $election_participant_ids ) )
                                              {  
                                            foreach ($election_participant_ids as $election_participant_id ) {
                                                
                                                if( $election_participant_id == $participant->id )
                                                {
                                                    echo "selected";
                                                }
                                            }
                                        }//endif
                                        ?>

                                            
									  >{{ $participant->name }}</option>

									@endforeach 


							</select>

						   
						</div>

						</div>

						<div class="row">

						<!-- Submit Field -->
						<div class="form-group col-sm-12">

						 <button type="submit" style="margin-right: 10px;"  class="btn btn-primary" ><i class="fa fa-check"></i>&nbsp;&nbsp;Save</button>  

                         <a href="{!! route('admin.elections.index') !!}" class="btn btn-default"><i class="fa fa-times"></i>&nbsp;&nbsp;Cancel</a>
                         
						</div>

						</div>

                        {!! Form::close() !!}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection


      

@section( 'js' )

<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    }); 


    // Initialize Select2
    $(function() {
      $('.select2-example').select2({
        placeholder: 'Select Participant',
      });
    });


    $('#validation-form').validate({
        focusInvalid: false,
        rules: {
          
          'election_participant_ids[]' : {
            required: true
          }

        },

        messages: {
          
          'election_participant_ids[]': {
            required: "Select atleast one Participant",
          }
        }

    });


</script>

@endsection

