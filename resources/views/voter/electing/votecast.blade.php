



@extends( 'voter.default' )

@section( 'content' )
        


         <div class="col-md-9 col-md-offse-3"></div>
        <div class="px-content">
        <div class="page-header">


            
        </div>

        <div class="row">

        <div class="col-md-3">

        <!-- Links -->
        <div class="panel panel-success panel-dark widget-profile">
          <div class="panel-heading">
            <!-- <img src="assets/demo/avatars/2.jpg" alt="" class="widget-profile-avatar"> -->

            <div class="row">
                
                <div class="col-md-8">
                  <label>Election Info.</label><br>
                  <h3 class="widget-profile-header">
                     {{ $election->title  }}
                    <span class="widget-profile-secondary-text"></span>
                  </h3>

                </div>
                <div class="col-md-4 ">
                  
                   <!-- <label>Election Time  </label><br>
                  <h3 class="widget-profile-header countdown2">
                    <span class="widget-profile-secondary-text "></span>
                  </h3> -->

                 
                </div>

            </div>
              

            
            
            <i class="widget-profile-bg-icon ion-ios-clock-outline"></i>
          </div>
          <div class="list-group">
            <!-- <a href="#" class="list-group-item"><i class="fa fa-calendar list-group-icon"></i>Election Date: <span class="right">
              {{  date( 'F d, Y', strtotime( $election->election_year ) )  }}</span></a> -->
            <a href="#" class="list-group-item"><i class="fa fa-clock-o list-group-icon"></i>Start Date and Time <span class="right">{{ date( 'F d, Y H:m:s', strtotime( $election->voting_start ) ) }}</span></a>
            <a href="#" class="list-group-item"><i class="fa fa-hourglass-start list-group-icon"></i>End Date and Time <span class="right">{{ date( 'F d, Y H:m:s', strtotime( $election->voting_end ) ) }}</span></a>
            
            

            <a href="#" class="list-group-item"><i class="fa fa-users list-group-icon"></i>Total Participants:<span class="right">{{ ( $participants != "0" )?count($participants):'0' }}</span></a>

            <a href="#" class="list-group-item"><i class="fa fa-pencil-square-o list-group-icon"></i> Total Votes:<span class="right">{{ ( $participants != "0" )?$grandTotal:'0' }}</span></a>

           
          </div>
        </div>

      </div>

      <div class="col-md-9">


        <div class="panel">
            <div class="panel-body">

             <div class="row">
                  
             <div class="col-md-6">
              <h2 style="margin: 10px 0px 20px 0;"><span class="text-muted font-weight-dark"><i class="fa fa-check-square"></i>&nbsp;   Vote For "{{ $election->title  }}" </span></h2>
            </div> 

            <div class="col-md-6 text-right">
              <h3 style="margin: 10px 0px 20px 0;">Voting Time <strong><span class="countdown text-primary"></span></strong> mins left</h3>
            </div> 

              </div>


        @include('flash::message')
              @if( $participants != "0" )


               

                <div class="table-primary">

                    <div class="row">

                      
                       
                      @foreach( $participants as $key => $participant )
                        
                        
                       <a style="cursor: pointer;" data-toggle="modal"  data-target="#confirmBtn" class="participant" id="{{ $participant->id }}" >
                        
<!--                         <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-warning">Warning</button> -->

                        <div class="col-md-4">

                        <!-- Links -->
                        <div class="panel-custom-hover panel panel-danger panel-dark widget-profile">
                          <div class="panel-heading">
                            <!-- <img src="assets/demo/avatars/2.jpg" alt="" class="widget-profile-avatar"> -->
                            <h3 class="widget-profile-header">

                              
                                 {{ $participant->name }}
                                
                              <!-- <span class="widget-profile-secondary-text">email@example.com</span> -->
                            </h3>

                            <p style="margin: 0; text-align: left;">Political Group:&nbsp;&nbsp;<strong>{{ $groups[$key] }}</strong></p>

                            <i class="widget-profile-bg-icon fa fa-user"></i>
                          </div>
                          
                        </div>

                      </div>

                    </a>
                        

                  

                     
                     
                      @endforeach

                      <!-- MODAL -->
                         <div id="confirmBtn" class="modal fade modal-alert modal-warning" style="display: none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header"><i class="fa fa-warning"></i></div>
                              <div class="modal-title">Are you sure? </div>
                              <div class="modal-body">You won't be able to change your VOTE</div>
                              <div class="modal-footer">

                                <form action="{{ route( 'voter.vote.cast' ) }}" method="POST" id="voteCastForm">
                                    
                                    {{ csrf_field() }}
                                    <input type="hidden" name="election_id"    value="{{ $election_id  }}" /> 
                                    <input type="hidden" name="voter_id"  value="{{ Auth::guard('voter')->user()->id  }}" > 
                                    <input type="hidden" name="mobile_no"      value="{{ Auth::guard('voter')->user()->mobile_no  }}" > 
                                    <input type="hidden" name="voting_start"   value="{{ $election->voting_start }}" > 
                                    <input type="hidden" name="voting_end"     value="{{ $election->voting_end }}" > 
                              
                                    <input class="form-control"  type="hidden" id="participant_id" name="participant_id" 
                                           value="">


                                    <button  type="submit" style="margin-right: 10px;" class="voteCastBtn btn btn-primary" ><i class="fa fa-check"></i>&nbsp;&nbsp;Cast Vote</button>

                              
                              <button  type="button" class="closeBtn btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Close</button>

                              <!--   <button type="button" class="btn btn-warning" data-dismiss="modal">OK</button> -->
                              </div>

                              </form>
                            </div>
                          </div>
                        </div> 
                  <!-- MODAL END -->
                     
                     

                      <div class="row">
                        <!-- Submit Field -->
                      <div class="form-group col-sm-12">

                         <!--  <button type="button" data-toggle="modal" data-target="#confirmBtn" style="margin-right: 10px;" class="btn btn-primary" ><i class="fa fa-check"></i>Cast Your Vote</button> -->


                       
                    </div>


                       @else

                        <h1 class="text-center" >No Participant Found</h1>
                        

                      @endif
                   
                </div>
            </div>
        </div>
      </div>
    </div>

  </div>


  @endsection


 @section( 'js' )

    <script type="text/javascript">




        


        
        $("#voteCastForm").validate({

            focusInvalid: false,
            rules: {

              'participant_id' : {

                required: true,
              },

              
            },

            messages: {

              'participant_id' : {

                required: "Please Select One Candidate for Vote",
              },



            },


          });          


    </script>


    <script type="text/javascript">

                        $('.participant').click(function(){

                          var id =  $(this).attr('id');

                          $("#participant_id").val(id); 

                        });

                        $( '.voteCastBtn' ).click(function(){

                                $(this).attr("disabled", true);

                                //$(".closeBtn").attr("disabled", true);
                                
                                $( this ).html('<div class="text-center"><i class="fa fa-spinner fa-spin"></i>&nbsp;&nbsp;Processing...</div>');

                                $( '#voteCastForm' ).submit();

                        });


                        var timer2 = "5:01";
                        var interval = setInterval(function() {


                          var timer = timer2.split(':');
                          //by parsing integer, I avoid all extra string processing
                          var minutes = parseInt(timer[0], 10);
                          var seconds = parseInt(timer[1], 10);
                          --seconds;
                          minutes = (seconds < 0) ? --minutes : minutes;
                          seconds = (seconds < 0) ? 59 : seconds;
                          seconds = (seconds < 10) ? '0' + seconds : seconds;
                          //minutes = (minutes < 10) ?  minutes : minutes;
                          $('.countdown').html(minutes + ':' + seconds);
                          if (minutes < 0) clearInterval(interval);
                          
                          //check if both minutes and seconds are 0
                          if ((seconds <= 0) && (minutes <= 0))
                          {
                           clearInterval(interval);

                           location.href = "{{ route( 'voter.logout' ) }}";
                           
                          }

                          timer2 = minutes + ':' + seconds;
                        }, 1000);

     </script>      



     <script type="text/javascript">

                        // var date = new Date();
                        // var hour = date.getHours() - (date.getHours() >= 12 ? 12 : 0);
                        // var period = date.getHours() >= 12 ? 'PM' : 'AM';


                        // var endTime = "<?= $election->voting_end ?>";

                       

                        // today     = (date.getMonth()+1) + "/" + date.getDate() + "/" + date.getFullYear();

                        //   // console.log( today );

                        // current             = hour + ':' + date.getMinutes() + ' ' +period;
                        // endTime             = Date.parse(today+' '+endTime);  



                        // current = Date.parse(today+' '+current);
                        
                        
                        // console.log("END  "+endTime);
                        // console.log("Current "+current);

                       
                        // var diff  = ( endTime - current  );

                        // console.log(diff);

                        // var Mins = Math.round(((diff % 86400000) % 3600000) / 60000); // minutes

                        // console.log(Mins);


                        // var timer3 = Mins+":01";
                        // var interval2 = setInterval(function() {


                        //   var timer2 = timer3.split(':');
                        //   //by parsing integer, I avoid all extra string processing
                        //   var minutes2 = parseInt(timer2[0], 10);
                        //   var seconds2 = parseInt(timer2[1], 10);
                        //   --seconds2;
                        //   minutes2 = (seconds2 < 0) ? --minutes2 : minutes2;
                        //   seconds2 = (seconds2 < 0) ? 59 : seconds2;
                        //   seconds2 = (seconds2 < 10) ? '0' + seconds2 : seconds2;
                        //   //minutes = (minutes < 10) ?  minutes : minutes;
                        //   $('.countdown2').html(minutes2 + ':' + seconds2);
                        //   if (minutes2 < 0) clearInterval(interval2);
                          
                        //   //check if both minutes and seconds are 0
                        //   if ((seconds2 <= 0) && (minutes2 <= 0))
                        //   {
                        //    clearInterval(interval2);

                        //    //location.href = "{{ route( 'voter.logout' ) }}";
                        //    // location.reload();
                        //   }

                        //   timer3 = minutes2 + ':' + seconds2;
                        // }, 1000);

     </script>                                

 @endsection