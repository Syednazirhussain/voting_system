<!-- Title Field -->
<div class="row">
<div class="form-group col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'General Election']) !!}

    <div class="errorTxt"></div> 
</div>





</div>

<div class="row">

<!-- Voting Start Field -->
<div class="form-group col-sm-6">
    {!! Form::label('voting_start', 'Start Date and Time') !!}
    <input type="text" name="voting_start" id="voting_start" value="@if(isset($start_date)){{ $start_date }}@endif" class="form-control startdate">
    <div class="errorTxt"></div> 
    <p id="starttime-error" ></p>
</div>

<!-- Voting End Field -->
<div class="form-group col-sm-6">
    {!! Form::label('voting_end', 'End Date and Time') !!}
    <input type="text" name="voting_end" id="voting_end" value="@if(isset($end_date)){{ $end_date }}@endif" class="form-control enddate">

    <div class="errorTxt"></div> 
</div>


<!-- Description Field -->
<div class="form-group col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '6' , 
                                             'placeholder' => 'Max. 500 Characters allowed']) !!}

  <div class="errorTxt"></div> 
</div>
</div>




<div class="row">

        
    
      <!-- Candidate Id Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('election_participant_ids', 'Participants') !!}
                            
                            <select id="election_participant_ids" name="election_participant_ids[]" class="form-control select2-example" multiple>
                                    


                                    <option value="" >Select Participants</option>
                                   
                                    @foreach( $participants as $participant )
                                        

                                     <option  value="{{ $participant->id }}"

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

                            <input type="hidden" id="compare_election_participant_ids" value="" >
                            <div class="errorTxt"></div> 
                           
                        </div>
                </div>    

               
       



<div class="row">
<!-- Submit Field -->
<div class="form-group col-sm-12">
    @if( isset( $election ) )
    
    <button type="submit" style="margin-right: 10px;" class="btn btn-primary"><i class="fa fa-refresh">&nbsp;&nbsp;</i>Update</button>
    
    @else

    <button type="submit" style="margin-right: 10px;" class="btn btn-primary" ><i class="fa fa-check">&nbsp;&nbsp;</i>Save</button>

    @endif

    <a href="{!! route('admin.elections.index') !!}" class="btn btn-default"><i class="fa fa-times">&nbsp;&nbsp;</i>Cancel</a>
</div>

</div>


