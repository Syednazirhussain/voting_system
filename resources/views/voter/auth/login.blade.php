<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Login | Voting System</title>

        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">
        <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="{{ asset('/skin-1/assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/skin-1/assets/css/pixeladmin.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/skin-1/assets/css/widgets.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/skin-1/assets/css/themes/candy-orange.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/skin-1/assets/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css') }}" rel="stylesheet">

        
        @yield('css') 

        <link href="{{ asset('/skin-1/assets/css/custom.css') }}" rel="stylesheet">
        <!-- holder.js -->
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/holder/2.9.0/holder.js"></script>
        <!-- Pace.js -->
        <script src="{{ asset('/skin-1/assets/pace/pace.min.js') }}"></script>
        <script src="{{ asset('/skin-1/assets/demo/demo.js') }}"></script>
        
        <!-- Custom styling -->
        <style>
            .page-header-form .input-group-addon,
            .page-header-form .form-control {
            background: rgba(0,0,0,.05);
            }
        </style>
        <!-- / Custom styling -->

  <!-- Custom styling -->
  <style>
    .page-signin-header {
      box-shadow: 0 2px 2px rgba(0,0,0,.05), 0 1px 0 rgba(0,0,0,.05);
    }

    .page-signin-header .btn {
      position: absolute;
      top: 12px;
      right: 15px;
    }

    html[dir="rtl"] .page-signin-header .btn {
      right: auto;
      left: 15px;
    }

    .page-signin-container {
      width: auto;
      margin: 0px 10px;
      padding: 15% 0px 16% 0px;
    }

    .page-signin-container form {
      border: 0;
      box-shadow: 0 2px 2px rgba(0,0,0,.05), 0 1px 0 rgba(0,0,0,.05);

    }

    @media (min-width: 544px) {
      .page-signin-container {
        width: 350px;
        margin: 0px auto;
      }
    }



    #page-signin-forgot-form { 

      padding: 15% 0px 16% 0px;

      display: none; }

    .error {
        color: red;
    }
  </style>
  <!-- / Custom styling -->
</head>
<body >


  <!-- Sign In form -->
<section id="formContent" style="background-image: url('{{ asset('skin-1/assets/demo/bgs/2.jpg')  }}'); background-size: cover !important;">
  
  <div class="page-signin-container" id="page-signin-form" >
    <h2 class="m-t-0 m-b-4 text-xs-center font-weight-semibold color-white">VOTING SYSTEM</h2>
    <h4 class="m-t-0 m-b-4 text-xs-center font-weight-semibold  color-white">Sign In to your Account
</h4>

<div id="authFail" ></div>
    
  


  

    <form action="#" method="POST" class="panel p-a-4" id="loginForm">

      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <fieldset class=" form-group form-group-lg">
        <input type="text" id="email" name="email" class="form-control" placeholder="Email">
      </fieldset>

     <!--  <fieldset class=" form-group form-group-lg">
        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
      </fieldset> -->

      <fieldset class=" form-group form-group-lg">
        <input type="text" id="mobile_no" name="mobile_no" class="form-control" placeholder="Phone Number">
      </fieldset>

      <fieldset class=" form-group form-group-lg">
        <input type="text" id="ssn" name="ssn" class="form-control" placeholder="Social Security Number">
      </fieldset>


     <!--  <div class="clearfix">
        <a href="#page-signin-forgot-form" class="font-size-12 text-muted" id="page-signin-forgot-link">Forgot your password?</a>
      </div>
 -->

      <button type="submit" id="loginBtn" class="btn btn-block btn-lg btn-primary m-t-3">LOGIN</button>
    </form>

  </div>

  <!-- / Sign In form -->


 </section>



  


  <!-- Modal Form -->
  <!-- Moda l -->
               <div class="modal fade" id="sendCodeModal" tabindex="-1">
                 <div class="modal-dialog modal-sm">
                   <div class="modal-content">
                     <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal">×</button>
                       <h4 class="modal-title">SEND AUTHENTICATION CODE</h4>
                     </div>
                    <div class="modal-body">
              
                         <div class="row">

                          <p>Verification Code Sent Successfully!</p>
                         
                         </div>

                       
                     <div class="modal-footer "> </div>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                   </div>
  



  <!-- ==============================================================================
  |
  |  SCRIPTS
  |
  =============================================================================== -->



        <!-- jQuery -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="{{ asset('/skin-1/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/skin-1/assets/js/pixeladmin.min.js') }}"></script>
        <script src="{{ asset('/skin-1/assets/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>

        <script src="{{ asset('/skin-1/assets/js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('/skin-1/assets/js/additional-methods.js') }}"></script>
        
        <script src="{{ asset('/skin-1/assets/js/custom.js') }}"></script>


        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>


        <script type="text/javascript">


          $( '.authFail' ).hide();

         

          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          
          // Initialize validator
          $('#loginForm').validate({
            focusInvalid: false,
            rules: {
              'email': {
                required: true,
                maxlength: 100,
                email: true,
              },
              // 'password': {
              //   required: true,
              //   minlength: 6,
              //   maxlength: 20,
              // },

               'mobile_no': {
                required: true,
                minlength: 1,
                maxlength: 15,
                
              },              

               'ssn': {
                required: true,
                minlength: 11,
                maxlength: 11,

              }
            },

            messages: {
              'email': {
                required: "Please enter email",
              },
              // 'password': {
              //   required: "Please enter password",
              // },

              'ssn': {
                required: "Please enter SSN Number",
                minlength: "Please enter 9 digit number",

              },

              'mobile_no': {
                required: "Please enter Phone Number",
                minlength: "Please enter 12 digit number",
              },


            }

          });

        
          $(document).keypress(function(e) {
              if(e.which == 13) {
                  $( "#loginForm" ).submit();
              }
          });

            


          //  $( '#verifyBtn' ).addEventListener( "keyup" , function(e) {
             
          //    e.preventDefault();

          //     if(e.keyCode  == 13) {
                  
          //         $( "#otpForm" ).submit();
          //     }
          // });


          $( "#loginForm" ).submit( function() {


              $.ajax({

                  url: "{{ route( 'voter.authenticate' ) }}",
                  type: "POST",
                  dataType: "json",
                  data: $(this).serialize(),


                   // beforeSend: function(  ) {
                      
                   //      $( '#spinner' ).html('<br><div class="text-center"><i class="fa fa-spinner fa-spin"></i>&nbsp;&nbsp;Processing...</div>');
                      
                   //    },



                  success: function( data )
                  {

                  if(data.success == 1)
                   {

                   phone = data.phone;
                   ssn   = data.ssn;
                   email = data.email;

                  uId   = data.uid;

                  $("#userId").val(uId);

                  $("#userSsn").val(ssn);

                  $( "#formContent" ).html(data.pageContent);

                        notificationMethod();

                //   OTP
                  } else{

                    $( "#authFail" ).html( '<div class="alert alert-danger alert-dark"><button type="button" class="close" data-dismiss="alert">×</button><strong>INVALID CREDENTIALS</strong></div>' );
                  }

                  },

                  error: function( xhr, err){

                     $( "#otpFail" ).html( '<div class="alert alert-danger alert-dark"><button type="button" class="close" data-dismiss="alert">×</button><strong>Something Went Wrong </strong> <a class="text-default" href="{{ route("voter.login") }}">Try Again</a></div>' );
                     
                    console.log("ERROR");
                  }


              });

              return false;

          } );


          //NOTIFICATION METHOD
          function notificationMethod() {
            
            

          $(".codeMethod").click(function(){
                 

                 var radioName = $(this).attr("name"); //Get radio name
                 $(":radio[name='"+radioName+"']").attr("disabled", true); //Disable all with the same name

                 var codeMethod = $(this).val();

                 if( codeMethod == "phone" )
                 {

                  //OTP BY PHONE

                   $.ajax({

                    url: "{{ route( 'voter.otp.parameters' ) }}",
                    type: "POST",
                    dataType: "json",
                    data: { 'phone':phone,'ssn':ssn,'userId':uId },

                      beforeSend: function(  ) {
                      
                        $( '#spinner' ).html('<br><div class="text-center"><i class="fa fa-spinner fa-spin"></i>&nbsp;&nbsp;Processing...</div>');
                      
                      },

                    success: function( data ){

                      console.log(data); 
                      var otp = data.otp;


                      if(data.success)
                      {
                         
                        $('#steps').html(data.content);
                        otpForm();
                        //timer
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

                            $.ajax({

                              url : "{{ route( 'voter.reset.otp' ) }}",
                              type: "POST",
                              data: { 'id':uId },
                              success:function(data){


                              clearInterval(interval);
                              location.reload();
                              
                              }

                            });

                           //clearInterval(interval);



                           
                          }

                          timer2 = minutes + ':' + seconds;
                        }, 1000);


                       
                        

                      } else{


                        

                        $( "#otpFail" ).html('');

                            $( "#otpFail" ).html( '<div class="alert alert-danger alert-dark"><button type="button" class="close" data-dismiss="alert">×</button><strong>Something Went Wrong </strong> <a class="text-default" href="{{ route("voter.login") }}">Try Again</a></div>' );

                      }

                    },


                   });
                    
                //PHONE OTP


                    
                 }else if( codeMethod == "email" )
                 {

                  var token = Math.floor(100000 + Math.random() * 900000);

                  


                  $.ajax({

                    url: "{{ route( 'voter.otp.email' ) }}",
                    type: "POST",
                    dataType: "json",
                    data: { 'email':email,'token':token, 'userId':uId,'ssn':ssn },

                    beforeSend: function(  ) {
                      
                        $( '#spinner' ).html('<br><div class="text-center"><i class="fa fa-spinner fa-spin"></i>&nbsp;&nbsp;Processing...</div>');
                      
                      },

                    success: function( data ){

                       if(data.success)
                       {

                        

                        $('#steps').html(data.content);

                        otpForm();

                      
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


                             $.ajax({

                              url : "{{ route( 'voter.reset.otp' ) }}",
                              type: "POST",
                              data: { 'id':uId },
                              success:function(data){


                              clearInterval(interval);
                              location.reload();

                              }

                            });



                           
                          }

                          timer2 = minutes + ':' + seconds;
                        }, 1000);


                     }else{

                      $( "#otpFail" ).html( '<div class="alert alert-danger alert-dark"><button type="button" class="close" data-dismiss="alert">×</button><strong>Something Went Wrong </strong> <a class="text-default" href="{{ route("voter.login") }}">Try Again</a></div>' );

                     } 

                    },


                   });


                 }



              });


          }

          


          function otpForm() {
            

            $("#otpForm").validate({

            focusInvalid: false,
            rules: {

              'codeMethod' : {

                //required: true,
              },

              'userCode' : {

                required : true,
                number   : true,
                minlength: 6,
                maxlength: 6,
              },


            },

            messages: {

              'codeMethod' : {

                required: "Please Select One Option for Receiving Code",
              },


              'userCode' : {

                required: "Please Enter Verification Code",
              },  

            },


          });


            $( "#otpForm" ).submit( function(event) {

              
              event.preventDefault();


              

              userCode = $("#userCode").val();

              userSsn =  $("#userSsn").val();
              
              userId =  $("#userId").val();
                       
              method = $('input[name=method]').val();

               console.log("value "+method);
                
              //  return false;  

              if( method != undefined )
              {




              if( method == "email" )
              {

                if( userCode != '' )
                {

                

                $.ajax({

                  url: "{{ route( 'voter.verify.otp_by_email' ) }}",
                  type: "POST",

                  data: { 'userCode' : userCode, 'userId':userId },


                  beforeSend: function(  ) {
                       
                       

                        
                         $("#verifyBtn").attr("disabled", true);
                        $( '#verifyBtn' ).html('<div class="text-center"><i class="fa fa-spinner fa-spin"></i>&nbsp;&nbsp;Processing...</div>');
                      
                      },



                  success:function(data){

                    console.log(data);

                     // return false;

                    if( data == 1 ) {

                           // alert("AUTHENTICATED"); 
                           // return false;

                           $("#verifyBtn").removeAttr("disabled");  
                          location.href = "{{ route( 'voter.dashboard' ) }}";
                          
                          }
                          else 
                          {


                             // alert("Invalid Data");
                             // return false;

                            $("#verifyBtn").removeAttr("disabled");
                            $( '#verifyBtn' ).html('Verify');
                            $( "#otpFail" ).html('');

                            $( "#otpFail" ).html( '<div class="alert alert-danger alert-dark"><button type="button" class="close" data-dismiss="alert">×</button><strong>Invalid Verification Code</strong> <a class="text-default" href="{{ route("voter.login") }}">Request New</a></div>' );

                            
                            console.log(data);
                           
                          }

                  },

                });


                }


              }else if( method == "phone" )
              {

               if( userCode != '' )
                {

              $.ajax({

                url: "https://textbelt.com/otp/verify?otp="+userCode+"&userid="+userSsn+"&key=9b0ce7bf76e864c1d27985d952ef8536fe2c94ea7hPTcVTJKLUZrI3KCn0mNhM0e",

                type: "GET",


                beforeSend: function(  ) {
                        
                  

                   $( '#verifyBtn' ).html('<div class="text-center"><i class="fa fa-spinner fa-spin"></i>&nbsp;&nbsp;Processing...</div>');
                  
                  $("#verifyBtn").attr("disabled", true);
                        
                       
                      
                      },


                success:function(data)
                { 

                   //auth using ID 

                   if(data.success && data.isValidOtp)
                   {

                      $.ajax({

                        //Authentication By Phone

                        'url'   : "{{ route( 'voter.verify.otp_by_phone' ) }}",
                        'type'  : 'POST',
                        'data'  : { 'id': userId },
                        success:function(data){

                          if(data){
                            console.log("Authenticated");
                           location.href = "{{ route( 'voter.dashboard' ) }}";
                            
                          }

                        },

                      });

 


                   }else{

                    $("#verifyBtn").removeAttr("disabled");

                     $( '#verifyBtn' ).html('Verify');

                        $( "#otpFail" ).html('');
                       $( "#otpFail" ).html( '<div class="alert alert-danger alert-dark"><button type="button" class="close" data-dismiss="alert">×</button><strong>Invalid Verification Code</strong> <a class="text-default" href="{{ route("voter.login") }}">Request New</a></div>' );

                      //alert("INVALID OTP CODE");
                      console.log("fail");
                      
                   } 

                  
                }


              });

            } //elseif end
              //return false;

         } 



       }else{

          // $( "#authFail" ).html( '<div class="alert alert-danger alert-dark"><button type="button" class="close" data-dismiss="alert">×</button><strong>INVALID CREDENTIALS</strong></div>' );
          $( "#otpFail" ).html('');

           

          

          console.log("undefined Method");
          //alert("Please Select One Option for Receiving OTP Code");
       } //codeMethod

       });


          }


           $(document).ready(function(){
        $('#ssn').mask('000-00-0000');
        $('#mobile_no').mask('+1-000-000-0000');
      });

      </script>




        @yield('js') 

        
</body>
</html>
