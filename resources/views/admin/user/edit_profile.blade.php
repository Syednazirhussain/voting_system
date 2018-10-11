

@extends('admin.default')

@section('content')

     <div class="px-content">
        <div class="page-header">
            <h1>
                <!-- <span class="text-muted font-weight-light"><i class="dropdown-icon fa fa-wrench"></i> User / </span> --> <i class="dropdown-icon fa fa-wrench"></i>&nbsp;&nbsp;Account Settings 
                
            </h1> 
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">{{ $user[0]->name }}</div>
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

         @if( Session::has( 'message' ) )

            <div class="alert alert-success">
                      
                  {{ Session( 'message' ) }}        
            </div>

         @endif

        
        <form  class="form-horizontal" id="validation-form" novalidate="novalidate"
               method="POST" action=" {{ route( 'admin.update.profile' ) }} ">
          

         {{ csrf_field() }}

          <input type="hidden" name="id" value="{{ Auth::guard( 'admin' )->user()->id }}">
                                                   
          <div class="form-group">
            <label for="validation-name" class="col-sm-3 control-label">Name</label>
            <div class="col-sm-9">
              <input type="text" value="{{ $user[0]->name }}" class="form-control" id="validation-name" name="name" placeholder="Name">
            </div>
          </div>

           <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email</label>

            <div class="col-sm-9">
              <input type="text" value="{{ $user[0]->email }}" class="form-control" id="validation-email" name="email" placeholder="Email" readonly>
              <!-- <small class="text-muted form-help-text">Example block-level help text here.</small>
 -->            </div>
          </div>

          <!-- <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Password</label>
            <div class="col-sm-9">
              <input type="password"  class="form-control" id="validation-password" name="password" placeholder="Password">
              <p class="text-muted form-help-text text text-danger">*Leave the field blank if you dont want to update your password.</p>
            </div>
          </div> -->
          
          <!-- <div class="form-group">
            <label for="validation-password-confirmation" class="col-sm-3 control-label">Confirm password</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" id="validation-password-confirmation" name="validation-password-confirmation" placeholder="Confirm password">
            </div>
          </div> -->


          <div class="form-group">
            <label for="ssn" class="col-sm-3 control-label">Social Security Number</label>
            <div class="col-sm-9">
              <input type="text" value="{{ $user[0]->ssn }}" class="form-control" id="ssn" name="ssn" placeholder="Social Security Number" >

              <input type="hidden" id="compare_ssn" value="{{ $user[0]->ssn }}" >
            </div>
          </div>

          <div class="form-group">
            <label for="mobile_no" class="col-sm-3 control-label">Phone</label>
            <div class="col-sm-9">
              <input type="text" value="{{ $user[0]->mobile_no }}" class="form-control" id="mobile_no" name="mobile_no" placeholder="Phone: 123456789">

              <input type="hidden" id="compare_mobile" value="{{ $user[0]->mobile_no }}" >

            </div>
          </div>
          

          <hr>

          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <button type="submit" class="btn btn-primary"><i class="fa fa-refresh">&nbsp;&nbsp;</i>Update</button>

              <a href="{{ route( 'admin.dashboard' ) }}" class="btn btn-default"><i class="fa fa-times">&nbsp;&nbsp;</i> Cancel</a>
            </div>
          </div>
        </form>
                    
                    </div>
                </div>
                
               
            </div>
        </div>
    </div>

@endsection


@section('js')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

  
  <script type="text/javascript">
        

    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });   
      
      // Initialize validator
      $('#validation-form').validate({
        focusInvalid: false,
        rules: {
          'name': {
            required: true,
            maxlength: 20,
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
          
         'ssn': {
            
            required: true,
                       
              remote: {
                param: {
                  url: "{{ route( 'admin.verify.ssn' ) }}",
                  type: "post",
                  
                  dataType : "json",
                  data: {
                     _token : $('meta[name="csrf-token"]').attr('content'), 
                    email: function() {
                      return $( "#ssn" ).val();
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
                return ( str != $('#compare_ssn').val() );
              }
            }
          },


          'password': {
            rangelength: [6,20],
          }
        },

        messages: {

          'email': {
            required: "Please enter the email address",
            remote: "email already in use",
          },

          'password': {
            rangelength: "Password length must be greater than 6 and less than 20",
          },

          'name' : {

                required: "Plaese enter your name",
                rangelength: "Name should be in the length of 6 to 20 characters",

              },

         'ssn' : {
                
                required: "Please enter your SSN number",
                rangelength: "Number should be 4 characters in length",
                remote: "social security number already in use",

              },

            'mobile_no' : {

                required: "Plaese enter your mobile number",
               
                remote: "Mobile number already in use",
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
