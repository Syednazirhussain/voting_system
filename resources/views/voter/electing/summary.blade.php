

<style type="text/css">
    
    .elected{

        color: blue;
    }
</style>

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
                  
                   <!-- <label>Voting Time  </label><br>

                   <div id="timer">
                      <span id="days"></span>days
                      <span id="hours"></span>hours
                      <span id="minutes"></span>minutes
                      <span id="seconds"></span>seconds
                  </div> -->

      <!--             <h3 class="widget-profile-header countdown"> -->
                    <span class="widget-profile-secondary-text "></span>
                  </h3>

                 
                </div>

            </div>

            <i class="widget-profile-bg-icon ion-ios-clock-outline"></i>
          </div>
          <div class="list-group">
           <!--  <a href="#" class="list-group-item"><i class="fa fa-calendar list-group-icon"></i>Election Date: <span class="right">
              {{  date( 'F d, Y', strtotime( $election->election_year ) )  }}</span></a> -->

            <a href="#" class="list-group-item"><i class="fa fa-clock-o list-group-icon"></i>Start Date and Time <span class="right">{{ date( 'F d, Y H:m:s', strtotime( $election->voting_start ) ) }}</span></a>
            <a href="#" class="list-group-item"><i class="fa fa-hourglass-start list-group-icon"></i>End Date and Time <span class="right">{{ date( 'F d, Y H:m:s', strtotime( $election->voting_end ) ) }}</span></a>
            
            

            <a href="#" class="list-group-item"><i class="fa fa-users list-group-icon"></i>Total Participants:<span class="right">{{ ( $participants != "0" )?count($participants):'0' }}</span></a>

            <a href="#" class="list-group-item"><i class="fa fa-pencil-square-o list-group-icon"></i> Total Votes:<span class="right">{{ ( $participants != "0" )?$grandTotal:'0' }}</span></a>

            <!-- <a href="{{ route( 'voter.logout' ) }}" class="list-group-item">Log Out</a> -->
          </div>
        </div>

      </div>

      <div class="col-md-9">


        <div class="panel">
            <div class="panel-body">

              <div class="row">
                  
             <div class="col-md-6">
              <h2 style="margin: 10px 0px 20px 0;"><span class="text-muted font-weight-dark"><i class="fa fa-book"></i>   Election Summary </span></h2>
            </div> 

            <div class="col-md-6 text-right">
              <h3 style="margin: 10px 0px 20px 0;"><strong><span class="text-primary"></span></strong>Your vote has been casted</h3>
            </div> 

              </div>

        @include('flash::message')

                <div class="text-right m-b-3">
                    
                <div style="color: green; font-size: 25px;">
                    
               
                </div>
                </div>
                <div class="table-primary">

                    <div class="row">

                    
                        <!-- {{ "Total Votes ".$grandTotal }} -->


                      @foreach( $participants as $key => $participant )
                        

                        <div class="col-md-4">

                        <!-- Links -->
                        <div class=" panel {{ ( $candidate == $participant->id )?'panel-success panel-custom-hover':'panel-danger' }} panel-dark widget-profile">
                          

                          <div class="panel-heading">
                            <!-- <img src="assets/demo/avatars/2.jpg" alt="" class="widget-profile-avatar"> -->
                             
                             <div class="row">
                                
                                <div class="col-md-8">
                                    
                                   <h3 class="widget-profile-header">
                                    {{ ucfirst( $participant->name ) }}
                                   </h3>                                  
                                </div>

                                <div class="col-md-4">

                                  <?php echo ( $candidate == $participant->id )?'<h3 style="margin:0;"><i class="fa fa-check-square-o"></i> Casted</h3>':'' ?>
                                  

                                </div>

                             </div>


                            <p style="margin: 0; text-align: left;">Political Group:&nbsp;&nbsp;<strong>{{ $groups[$key] }}</strong></p>


                            <!-- <i class="widget-profile-bg-icon ion-ios-clock-outline"></i> -->
                          </div>

                        <div class="list-group">
                            <a href="#" class="list-group-item"><!-- <i class="fa fa-envelope-o list-group-icon"></i> -->Votes:    <label class="label label-success">{{  $totalVotes[$key]  }}</label></a>
                            <!-- <a href="#" class="list-group-item"><i class="fa fa-tasks list-group-icon"></i>Uncompleted tasks<span class="badge badge-warning">7</span></a>
                            <a href="#" class="list-group-item"><i class="fa fa-bell-o list-group-icon"></i>New notifications<span class="badge badge-danger">11</span></a>
                            <a href="#" class="list-group-item">Account settings</a> -->
                          </div>
                        </div>

                      </div>
                        


                        @endforeach

                      

                      

                      
                       
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


                        function formatAMPM(date) {
                          var hours = date.getHours();
                          var minutes = date.getMinutes();
                          var ampm = hours >= 12 ? 'PM' : 'AM';
                          hours = hours % 12;
                          hours = hours ? hours : 12; // the hour '0' should be '12'
                          minutes = minutes < 10 ? '0'+minutes : minutes;
                          var strTime = hours + ':' + minutes + ' ' + ampm;
                          return strTime;
                        }


                        var date = new Date();

                        currentTime = formatAMPM(date);
                        
                        var endTime = "<?= $election->voting_end ?>";

                        today     = (date.getMonth()+1) + "/" + date.getDate() + "/" + date.getFullYear();

                        
                        console.log(currentTime)
                        console.log(endTime)


                       var timeStart = new Date(today+" "+ currentTime);
                       var timeEnd = new Date(today + endTime);

                       var diff = (timeEnd - timeStart) / 60000; //dividing by seconds and milliseconds
                           
                           
                           console.log(diff)

                        // var hour = date.getHours() - (date.getHours() >= 12 ? 12 : 0);
                        // var period = date.getHours() >= 12 ? 'PM' : 'AM';


                       

                        

                        // current             = hour + ':' + date.getMinutes() + ' ' +period;

                        
                       // console.log( "E "+endTime );

                        var c = (current);

                        var e = (endTime);

                        c = getTwentyFourHourTime(c);
                        e = getTwentyFourHourTime(e);

                       //   console.log( "C "+c );
                       // console.log( "E "+e );



                        function getTwentyFourHourTime(amPmString) { 
                                var d = new Date("1/1/2013 " + amPmString); 
                                return d.getHours() + ':' + d.getMinutes(); 
                            }
                        
                       



                        
                        var timer;

                            var compareDate = new Date();
                            compareDate.setDate(compareDate.getDate() + 7); //just for this demo today + 7 days

                            timer = setInterval(function() {
                              timeBetweenDates(compareDate);
                            }, 1000);

                            function timeBetweenDates(toDate) {
                              var dateEntered = e;
                              var now = c;
                              var difference = e - c;

                              if (difference <= 0) {

                                // Timer done
                                clearInterval(timer);
                              
                              } else {
                                
                                var seconds = Math.floor(difference / 1000);
                                var minutes = Math.floor(seconds / 60);
                                var hours = Math.floor(minutes / 60);
                                var days = Math.floor(hours / 24);

                                hours %= 24;
                                minutes %= 60;
                                seconds %= 60;

                                // $("#days").text(days);
                                $("#hours").text(hours);
                                $("#minutes").text(minutes);
                                $("#seconds").text(seconds);
                              }
                            }

                         // var hrs = Math.floor(sec / 3600);
                         //  var min = Math.floor((sec - (hrs * 3600)) / 60);
                         //  var seconds = sec - (hrs * 3600) - (min * 60);
                         //  seconds = Math.round(seconds * 100) / 100

                          
                        // //var Mins = Math.round(((diff % 86400000) % 3600000) / 60000); // minutes

                        // //console.log(Mins);


                        // var timer2 = min+":"+seconds;
                        // var interval = setInterval(function() {


                        //   var timer = timer2.split(':');
                        //   //by parsing integer, I avoid all extra string processing
                        //   var minutes = parseInt(timer[0], 10);
                        //   var seconds = parseInt(timer[1], 10);
                        //   --seconds;
                        //   minutes = (seconds < 0) ? --minutes : minutes;
                        //   seconds = (seconds < 0) ? 59 : seconds;
                        //   seconds = (seconds < 10) ? '0' + seconds : seconds;
                        //   //minutes = (minutes < 10) ?  minutes : minutes;
                        //   $('.countdown').html(minutes + ':' + seconds);
                        //   if (minutes < 0) clearInterval(interval);
                          
                        //   //check if both minutes and seconds are 0
                        //   if ((seconds <= 0) && (minutes <= 0))
                        //   {
                        //    clearInterval(interval);

                        //    //location.href = "{{ route( 'voter.logout' ) }}";
                        //    // location.reload();
                        //   }

                        //   timer2 = minutes + ':' + seconds;
                        // }, 1000);

     </script>                   

 @endsection

