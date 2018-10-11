



@extends( 'admin.default' )

@section( 'content' )
  
    {{ $user }}


     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="fa fa-edit"></i>&nbsp;&nbsp;Voter / </span>Edit</h1>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">{{ ucfirst( $user->name ) }}</div>
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

                      

                   <form action="{{ route( 'admin.voter.update' ) }}" method="POST" 
          						id="validation-form"  >

     

			      {{ csrf_field() }}


            <input type="hidden" name="id" value="{{ $id }}">
            
            <div class="row">

            <div class="form-group col-sm-6">

			      <fieldset class="form-group form-group-lg">

              {!! Form::label('name', 'Name:') !!}
			        <input type="text" value="{{ $user->name }}" class="form-control" name="name"  placeholder="George Simon">
              <div class="errorTxt"></div> 
			      </fieldset>

            </div>

            <div class="form-group col-sm-6">
              <fieldset class="form-group form-group-lg">
               {!! Form::label('dob', 'Date Of Birth:') !!}
                <input type="text" class="form-control" name="dob" id="dob" value="@if(isset($dob)){{ $dob }}@endif" placeholder="40">
                <div class="errorTxt"></div> 
              </fieldset>
            </div> 
 

            </div>

            <div class="row">

             <div class="form-group col-sm-6">
              {!! Form::label('gender', 'Gender') !!}
              
              <select class="form-control select2-example" id="gender" name="gender">
                   
                   <option value="" >Select Gender</option>
                   <option <?php echo ( $user->gender == 'MALE' )?"selected":""; ?>                 value="MALE" >MALE</option>
                   <option <?php echo ( $user->gender == 'FEMALE' )?"selected":""; ?>               value="FEMALE" >FEMALE</option>
                   <option <?php echo ( $user->gender == 'Not Disclosed' )?"selected":""; ?>   value="Not Disclosed" >Not Disclosed</option>
              
              </select>

              <div class="errorTxt"></div> 
            </div> 



            <div class="form-group col-sm-6">

			      <fieldset class="form-group form-group-lg">
              
              {!! Form::label('email', 'Email:') !!}

			        <input type="email" value="{{ $user->email }}" id="email"  name="email" class="form-control" 
                     placeholder="simon@gmail.com" readonly>
              <div class="errorTxt"></div> 
			      </fieldset>

			      <input type="hidden" id="compare_email" value="" >
			      
            </div>
            </div>

            <div class="row">

             <div class="form-group col-sm-6">

			       <fieldset class="form-group form-group-lg">

              {!! Form::label('mobile_no', 'Mobile No:') !!}
			        <input type="text" id="mobile_no" name="mobile_no" value="{{ $user->mobile_no }}" class="form-control" 
                     placeholder="+1-234-567-890">

              <input type="hidden" id="compare_mobile" value="{{ $user->mobile_no }}" >

              <div class="errorTxt"></div> 
			      </fieldset>

            </div>
            

            <div class="form-group col-sm-6">

			       <fieldset class="form-group form-group-lg">

              {!! Form::label('ssn', 'Social Security Number:') !!}
			        <input type="text" name="ssn" id="ssn" value="{{ $user->ssn }}"  class="form-control" placeholder="000-00-0000" >

              <div class="errorTxt"></div> 
			      </fieldset>


                <input type="hidden" id="compare_ssn" value="{{ $user->ssn }}" >

             </div>
             </div>


             <div class="row">

            <div class="form-group col-sm-12">

             <fieldset class="form-group form-group-lg">

              {!! Form::label('Address', 'Address:') !!}
              <input type="text" id="street1" name="street1" value="{{ $user->street_one }}" class="form-control"
                    placeholder="3300 West Wood Lawn Avenue">
            
             <div class="errorTxt"></div> 

            </fieldset>

            </div>
            
            </div>

            <div class="row">

            <div class="form-group col-sm-12">

             
             <fieldset class="form-group form-group-lg">
              
               <input type="text" id="street2" value="{{ $user->street_two }}" name="street2" class="form-control" 
                      placeholder="Apartment 123 (Optional)">
              
                </fieldset>
                
              </div>
            </div>

            <div class="row">

             <div class="form-group col-sm-6">
              {!! Form::label('state', 'State') !!}
              
              <select class="form-control select2-example" id="state" name="state">
                   
                   <option value="" >Select State</option>
                   <option <?php echo ( $user->state == "WA" )?"SELECTED":"" ?> value="WA" >Washington (WA)</option>
                   <option <?php echo ( $user->state == "OR" )?"SELECTED":"" ?> value="OR" >Oregon (OR)</option>
                   <option <?php echo ( $user->state == "CA" )?"SELECTED":"" ?> value="CA" >California (CA)</option>
                   <option <?php echo ( $user->state == "ID" )?"SELECTED":"" ?> value="ID" >Idaho (ID)</option>
                   <option <?php echo ( $user->state == "UT" )?"SELECTED":"" ?> value="UT" >Utah (UT)</option>
                   <option <?php echo ( $user->state == "NV" )?"SELECTED":"" ?> value="NV" >Nevada (NV)</option>
                   <option <?php echo ( $user->state == "AZ" )?"SELECTED":"" ?> value="AZ" >Arizona (AZ)</option>
                   <option <?php echo ( $user->state == "NM" )?"SELECTED":"" ?> value="NM" >New Mexico (NM)</option>
                   <option <?php echo ( $user->state == "TX" )?"SELECTED":"" ?> value="TX" >Texas (TX)</option>
                   <option <?php echo ( $user->state == "CO" )?"SELECTED":"" ?> value="CO" >Colorado (CO)</option>
              
              </select>

              <div class="errorTxt"></div> 
            </div> 
             
              
            <div class="form-group col-sm-6">

             <fieldset class="form-group form-group-lg">

              {!! Form::label('City', 'City:') !!}
              <input type="text" id="city" name="city" value="{{ $user->city }}" class="form-control" placeholder="Dallas">
              
              <div class="errorTxt"></div> 
            </fieldset>

            </div>
            
             
            </div>


            <div class="row">

            <div class="form-group col-sm-6">

              {!! Form::label('ZIP CODE', 'ZIP CODE:') !!}
             <fieldset class="form-group form-group-lg">
              
               <input type="text" id="zipcode" name="zipcode" value="{{ $user->zipcode }}" class="form-control" placeholder="78228">
               
              <div class="errorTxt"></div> 
                </fieldset>
                
             </div>

            </div>

			     <div class="row">
              <!-- Submit Field -->
              <div class="form-group col-sm-12">

                  
                  
                  
                  
                  <button type="submit" style="margin-right: 10px;" class="btn btn-primary" ><i class="fa fa-refresh">&nbsp;&nbsp;</i>Update</button>

                  <a href="{!! route('admin.voter.index') !!}" class="btn btn-default"><i class="fa fa-times">&nbsp;&nbsp;</i>Cancel</a>

              </div>

              </div>

              </form>

              </div>
            </div>

                
                
            </div>
        </div>
    
    </div>
@endsection

 
 @section( 'js' )


 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>



 <script type="text/javascript">

   $(document).ready(function(){
        $('#ssn').mask('000-00-0000');
        $('#mobile_no').mask('+1-000-000-0000');
      });


    jQuery.validator.addMethod("alphaspaces", function(value, element) {
            
      return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
          
    }, "use alphabets only");


    $('#dob').daterangepicker({
      singleDatePicker: true,
      showDropdowns: true,
      locale: {
      format: 'MM-DD-YYYY'
      }
    });



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

          'zipcode':{

            required:true,
            number:true,
            rangelength: [5,5],

          },

          'gender':{

            required:true,
          },

          'state':{

            required:true,
          },

          'street1':{

            required:true,
            rangelength: [2,200]
          },

          'city':{

            rangelength:[2,50],
            required:true,
            alphaspaces: true,
          },

          'mobile_no': {
            required: true,
            // number: true,
            // rangelength: [8,11],
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
            // number: true,
            // minlength: 4,
            // maxlength: 4,
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

                  //console.log($('#compare_ssn').val());
                  var str = $(element).val();
                  str     =  str.replace(/-/g, '');

                    console.log(str);
                // compare email address in form to hidden field
                return ( str != $('#compare_ssn').val() );
              }
            }
          },

          },

          messages: {
          
              'ssn' : {
                required: "Please enter your SSN number",
                //rangelength: "Number should be 4 characters in length",
                remote: "social security number already in use",

              },

              'name' : {

                required: "Plaese enter your name",
                rangelength: "Name should be minimum  2 characters in length",


              },

              'mobile_no' : {

                required: "Plaese enter your mobile number",
                remote:   "Mobile number already in use",

              },


               'age' : {
                required: "Please enter your age",
                rangelength: "Age should not be greater than 3 characters in length",

              },

              'zipcode' : {
                required: "Please enter ZIP Code",
                rangelength: "ZIP Code should 5 characters in length",

              },

              'gender':{

                required: "Please select gender",
              },
              
              'state':{

                required: "Please select your state",
              },

              'street1':{

                  required:"Please enter your address",
                  rangelength: "Address should not be greater than 200 characters"
                },

              'city':{

                required:"Please enter your city",
                rangelength: "City should not be greater than 50 characters"
              },

              
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


      </script>

      @endsection
