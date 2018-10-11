


@extends( 'voter.default' )

@section( 'content' )
        
  <style type="text/css">
     
  </style>

      

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
            <h3 class="widget-profile-header">
              {{ ucfirst( Auth::guard( 'voter' )->user()->name ) }}
              <span class="widget-profile-secondary-text">{{ Auth::guard( 'voter' )->user()->email }}</span>
            </h3>
            <i class="widget-profile-bg-icon fa fa-user"></i>
          </div>
          <div class="list-group">
            <a href="#" class="list-group-item"><i class="fa fa-mobile list-group-icon"></i>Phone Number: <span class="right"> {{ Auth::guard( 'voter' )->user()->mobile_no }}</span></a>

            <a href="#" class="list-group-item"><i class="fa fa-key list-group-icon"></i>Social Security Number <span class="right">{{ Auth::guard( 'voter' )->user()->ssn }}</span></a>

            <a href="#" class="list-group-item"><i class="fa fa-calendar-times-o list-group-icon"></i>Account Since<span class="right">
              
              <?php $date = Auth::guard( 'voter' )->user()->created_at; ?>
            {{  date( 'F d, Y', strtotime( $date )  )  }}</span></a>

            <a href="{{ route( 'voter.logout' ) }}" class="list-group-item"><i class="fa fa-sign-out list-group-icon"></i>Log Out</a>
          </div>
        </div>

      </div>

      <div class="col-md-9">



        <div class="panel">
            <div class="panel-body">

        <h2 style="margin: 10px 0px 20px 0;"><span class="text-muted font-weight-dark"><i class="ionicons ion-person-stalker"></i>  Elections </span></h2>
        @include('flash::message')

                

                <div class="table-primary">

                    <div class="row">

                    
                      
                      {{ csrf_field() }}

                      <?php $uid = Auth::guard( 'voter' )->user()->id ?> 
  
                      @if(count($elections))

                      @foreach( $elections as $election )
                      
                        <a href="{{ route( 'voter.election.vote', ['election_id' => $election->id, 'voter_id' => $uid ] ) }}">
                        <div class="col-md-4">

                        <div class="panel-custom-hover panel panel-danger panel-dark panel-body-colorful widget-profile widget-profile-centered">
                          <div class="panel-heading">
                            <!-- <img src="assets/demo/avatars/1.jpg" alt="" class="widget-profile-avatar"> -->
                            <h3 style="margin: 0; text-align: left;">
                              {{ $election->title }}
                            </h3>

                           
                          </div>
                          <div class="panel-body">
                              
                              <p class="countdown" id="<?php echo $election->voting_end ?>"></p>

                              <p>Voting Start:&nbsp;&nbsp;<strong>{{ date( 'F d, Y H:m:s', strtotime( $election->voting_start ) ) }}</strong></p>
                              <p>Voting End:&nbsp;&nbsp;<strong>{{ date( 'F d, Y H:m:s', strtotime( $election->voting_end ) ) }}</strong></p>
                              
                          </div>
                        </div>

                      </div>
                      </a>

                      @endforeach

                      

                      

                      @else

                      <h1 class="text-center" >NO ACTIVE ELECTION FOUND</h1>
                      @endif
                      
                       
                    </div>

                   
                </div>
            </div>
        </div>
    </div>


    </div>

   </div> 
  @endsection



 @section( 'js' )

    <script type="text/javascript">




        


        
        $("#electionForm").validate({

            focusInvalid: false,
            rules: {

              'election_id' : {

                required: true,
              },

              
            },

            messages: {

              'election_id' : {

                required: "Please Select One Election for Vote",
              },



            },


          });          


    </script>


    <script type="text/javascript">

                    //     var endTime = <?php //echo json_encode($endTime) ?>;
                         
                         
                    //      var Mins;
                    //      var minutes2;
                    //      var seconds2;
                    //      var show;



                    //     var date = new Date();
                    //     var hour = date.getHours() - (date.getHours() >= 12 ? 12 : 0);
                    //     var period = date.getHours() >= 12 ? 'PM' : 'AM';

                    //     today     = (date.getMonth()+1) + "/" + date.getDate() + "/" + date.getFullYear();


                    //     current             = hour + ':' + date.getMinutes() + ' ' +period;

                    //     current = Date.parse(today+' '+current);
                          
                    //       //console.log( current );

                    //       // var diff = [];

                          

                    //     $.each(endTime , function(ind, end) { 
                          
                    //       // console.log(ind, val)


                    //       end   = Date.parse(today+' '+end);



                    //       // console.log(end);
                    //        diff =    end - current ;
                    //        //25080000
                    //        Mins = Math.round(((25080000 % 86400000) % 3600000) / 60000); // minutes
                           
                    //        calculate(end,Mins);
                         
                    //        //alert(Mins);
                        


                    //     });


                    //     function calculate(end,Mins) {
                          

                           

                    //     console.log(Mins);


                    //     var timer3 = Mins+":01";
                    //     var interval2 = setInterval(function() {


                    //       var timer2 = timer3.split(':');
                    //       //by parsing integer, I avoid all extra string processing
                    //       var minutes2 = parseInt(timer2[0], 10);
                    //       var seconds2 = parseInt(timer2[1], 10);
                    //       --seconds2;
                    //       minutes2 = (seconds2 < 0) ? --minutes2 : minutes2;
                    //       seconds2 = (seconds2 < 0) ? 59 : seconds2;
                    //       seconds2 = (seconds2 < 10) ? '0' + seconds2 : seconds2;
                    //       //minutes = (minutes < 10) ?  minutes : minutes;


                    //       $(".countdown").each(function(){
                              
                    //           var id = $(this).attr('id');
                              
                    //            id  =  Date.parse(today+' '+id);
                              


                    //           if(id == end)
                    //           {
                    //             //alert(id);
                    //             $(this).html(minutes2 + ':' + seconds2);
                                
                                
                    //           }
                              
                              
                          


                    //         });
                    //        //show = minutes2 + ':' + seconds2;

                    //       if (minutes2 < 0) clearInterval(interval2);
                          
                    //       //check if both minutes and seconds are 0
                    //       if ((seconds2 <= 0) && (minutes2 <= 0))
                    //       {
                    //        clearInterval(interval2);

                    //        //location.href = "{{ route( 'voter.logout' ) }}";
                    //        // location.reload();
                    //       }

                    //       timer3 = minutes2 + ':' + seconds2;
                    //     }, 1000);

                    // }

                        

                        



     </script> 

    @endsection

 