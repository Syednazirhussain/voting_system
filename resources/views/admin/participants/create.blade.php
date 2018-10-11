


@extends( 'admin.default' )

@section( 'content' )

   
     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="fa fa-users"></i>&nbsp;&nbsp;Participant / </span>Add</h1>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Add Participants</div>
                    </div>


                    <div class="panel-body">
                    
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                        {!! Form::open(['route' => 'admin.participants.store', 'id'=>'validation-form']) !!}

                        @include('admin.participants.fields')

                    {!! Form::close() !!}
                    </div>
                </div>

                
                
            </div>
        </div>
    </div>
@endsection

 
 @section( 'js' )

 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>



 <script type="text/javascript">

 jQuery.validator.addMethod("alphaspaces", function(value, element) {
            
            return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
          
            }, "use alphabets only");



          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          
          // Initialize validator
          $('#validation-form').validate({
            focusInvalid: false,
            rules: {
          
          'name': {
            required: true,
            rangelength: [2,20],
            alphaspaces: true, 
          },

          

          'age':{

            required:true,
            number:true,
            rangelength: [1,3],

          },
         
             'ssn': {
            
            required: true,
            
              remote: {
                param: {
                  url: "{{ route( 'admin.verify.ssn' ) }}",
                  type: "post",
                  dataType : "json",
                  data: {
                    email: function() {
                      return $( "#ssn" ).val();
                    }
                  },                         
                  dataFilter: function(response) {
                    return checkField(response);
                  }
              },
              depends: function(element) {
                // compare email address in form to hidden field
                return ( $(element).val() !== $('#compare_ssn').val() );
              }
            }
          },


          'email': {
            required: true,
            email: true,
            rangelength: [3,50],
              remote: {
                param: {
                  url: "{{ route( 'admin.verify.email' ) }}",
                  type: "post",
                  dataType : "json",
                  data: {
                    email: function() {
                      return $( "#email" ).val();
                    }
                  },                         
                  dataFilter: function(response) {
                    return checkField(response);
                  }
              },
              depends: function(element) {
                // compare email address in form to hidden field
                return ( $(element).val() !== $('#compare_email').val() );
              }
            }
          },

          'mobile_no': {
            required: true,
            
            remote: {
                param: {
                  url: "{{ route( 'admin.verify.phone' ) }}",
                  type: "post",
                  
                  dataType : "json",
                  data: {
                     _token : $('meta[name="csrf-token"]').attr('content'), 
                    mobile_no: function() {
                      return $( "#mobile_no" ).val();
                    }
                  },                         
                  dataFilter: function(response) {
                    return checkField(response);
                  }
              },
              depends: function(element) {

                var str = $(element).val();
                  str     =  str.replace(/-/g, '');
                // compare email address in form to hidden field
                return ( str != $('#compare_mobile').val() );
              }
            }

          },


          // 'password': {
          //  minlength: 6,
          //  maxlength: 20,
          //  required: true,
          // },

          'political_group_id': {

           required: true,
          },
        },

          messages: {
          
              'email': {
                required: "Please enter the email address",
                remote: "email already in use",
          
              },
          
              // 'password': {
              //   required: "Please enter password",
              //   minlength: "Password should be minimum  6 characters in length",
              //   maxlength: "Password should be maximim  20 characters in length",
              // },

              'age' : {
                required: "Please enter your age",
                rangelength: "Age should not be greater than 3 characters in length",

              },

                'ssn' : {
                required: "Please enter your SSN number",
                
                remote: "social security number already in use",

              },

              'name' : {

                required: "Plaese enter your name",
                rangelength: "Name should be minimum  2 characters in length",


              },

              'mobile_no' : {

                required: "Plaese enter your mobile number",
                remote: "Mobile number already in use",
              },

              'political_group_id' : {

                required: "Select political group"

              }
              

            },

            errorPlacement: function(error, element) {
                        var placement = $(element).parent().find('.errorTxt');
                        if (placement) {
                          $(placement).append(error)
                        } else {
                          error.insertAfter(element);
                        }
                    }

          });

          checkField = function(response) {
          switch ($.parseJSON(response).code) {
              case 200:
                  return "true"; // <-- the quotes are important!
              case 401:
                  // alert("Sorry, our system has detected that an account with this email address already exists.");
                  break;
              case undefined:
                  alert("An undefined error occurred.");
                  break;
              default:
                  alert("An undefined error occurred");
                  break;
          }
          return false;
      };

      $(document).ready(function(){
        $('#ssn').mask('000-00-0000');
        $('#mobile_no').mask('+1-000-000-0000');
      });

      </script>

      @endsection