<table class="table table-responsive" id="datatables">
    <thead>
        <tr>
            <th>Title</th>
        <th>Start Date and Time</th>
        <th>End Date and Time</th>
        <th>Participants</th>
        <th>End Election</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($elections as $election)
        <tr>
            <td>{!! ucfirst( $election->title ) !!}</td>
            
            
            <td> {{  \Carbon\Carbon::parse($election->voting_start)->format('m-d-Y H:m') }}  </td>
            <td> {{  \Carbon\Carbon::parse($election->voting_end)->format('m-d-Y H:m') }} </td>
            
            <td>
            

                    @foreach($key_value_pair as $election_id => $participant_names )

                        @if($election->id == $election_id)

                            @foreach($participant_names as $participant_name)

                               &nbsp;<label class="label label-info">{{ ucfirst($participant_name) }}</label>&nbsp;

                            @endforeach

                        @endif

                    @endforeach



<!--                 <a href=" route( 'admin.election.assignParticipants', ['id' => election->id] ) ">Assign Participants</a> -->
            </td>
            
            <td><?php 

                $now = date( 'Y-m-d H:i:s' );

                //dd($now);
                $end = $election->voting_end;

                $start = $election->voting_start;

                
               if( $start <= $now &&   $end > $now)
               {
               ?> 
               
               <a href="{{ route( 'admin.election.end_election', ['id' => $election->id ] ) }} " class="btn btn-primary">End Election</a>
              <?php

                
               }else{ 

                ?>
                    
                    <a href="{{ route( 'admin.election.end_election', ['id' => $election->id ] ) }} " class="btn btn-primary">View Report</a>
            <?php  
               } 
            ?></td>

            <td width="100px" class="center text-center padding-t-20">

                <form method="post" action="{{ route('admin.election.destroy', [$election->id]) }}" accept-charset="UTF-8">
                    <input name="_method" type="hidden" value="DELETE">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"> 
            
                    <a href="{{ route('admin.election.edit', [$election->id]) }}"><i class="fa fa-edit fa-lg text-info icon-set"></i></a>

                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>