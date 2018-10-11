



@extends( 'admin.default' )

@section( 'content' )

   
     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="fa fa-edit"></i>&nbsp;&nbsp;Voter / </span>Add</h1>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Add  Voter</div>
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

                      

                   <form action="{{ route( 'admin.voter.store' ) }}" method="POST" 
          						id="validation-form"  >

     

			      {{ csrf_field() }}


			      <div class="row">

			      <div class="form-group col-sm-6">
			      <fieldset class="form-group form-group-lg">
			      	{!! Form::label('name', 'Name:') !!}
			        <input type="text" class="form-control" name="name" placeholder="George Simon">

              <div class="errorTxt"></div> 
			      </fieldset>

			      </div>

            <div class="form-group col-sm-6">
              <fieldset class="form-group form-group-lg">
               {!! Form::label('dob', 'Date Of Birth:') !!}
                <input type="text" class="form-control" name="dob" id="dob" placeholder="40">
                <div class="errorTxt"></div> 
              </fieldset>
            </div>  

            </div>

            <div class="row">

             <div class="form-group col-sm-6">
              {!! Form::label('gender', 'Gender') !!}
              
              <select class="form-control select2-example" id="gender" name="gender">
                   
                   <option value="" >Select Gender</option>
                   <option value="MALE" >MALE</option>
                   <option value="FEMALE" >FEMALE</option>
                   <option value="Not Disclosed" >Not Disclosed</option>
              
              </select>
              <div class="errorTxt"></div> 
            </div> 

			      <div class="form-group col-sm-6">
			      
			      <fieldset class="form-group form-group-lg">
			      	{!! Form::label('email', 'Email:') !!}
			        <input type="email" id="email"  name="email" class="form-control" placeholder="simon@gmail.com">

              <div class="errorTxt"></div> 
			      </fieldset>

			      <input type="hidden" id="compare_email" value="" >
			      </div>
			      </div>

            <div class="row">

            

            <div class="form-group col-sm-6">

             <fieldset class="form-group form-group-lg">

              {!! Form::label('mobile_no', 'Mobile No:') !!}
              <input type="text" id="mobile_no" name="mobile_no" class="form-control" placeholder="+1-234-567-890">

              <div class="errorTxt"></div> 
            </fieldset>
              <input type="hidden" id="compare_mobile" value="" >

            </div>
            

            <div class="form-group col-sm-6">

             <fieldset class="form-group form-group-lg">
              {!! Form::label('ssn', 'Social Security Number:') !!}
              <input type="text" id="ssn" name="ssn" class="form-control" placeholder="000-00-0000">

              <div class="errorTxt"></div> 
            </fieldset>
            <input type="hidden" id="compare_ssn" value="" >
            </div>
            </div>


            <div class="row">

            

            <div class="form-group col-sm-12">

             <fieldset class="form-group form-group-lg">

              {!! Form::label('Address', 'Address:') !!}
              <input type="text" id="street1" name="street1" class="form-control" placeholder="3300 West Wood Lawn Avenue">
              <div class="errorTxt"></div> 
            </fieldset>

            </div>
            </div>

            <div class="row">
              
            <div class="form-group col-sm-12">

             
             <fieldset class="form-group form-group-lg">
              
               <input type="text" id="street2" name="street2" class="form-control" placeholder="Apartment 123 (Optional)">
              
             </fieldset>
                
              </div>
            </div>


            

            <div class="row">

             <div class="form-group col-sm-6">
              {!! Form::label('state', 'State') !!}
              
              <select class="form-control select2-example" id="state" name="state">
                   
                   <option value="" >Select State</option>
                   <option value="WA" >Washington (WA)</option>
                   <option value="OR" >Oregon (OR)</option>
                   <option value="CA" >California (CA)</option>
                   <option value="ID" >Idaho (ID)</option>
                   <option value="UT" >Utah (UT)</option>
                   <option value="NV" >Nevada (NV)</option>
                   <option value="AZ" >Arizona (AZ)</option>
                   <option value="NM" >New Mexico (NM)</option>
                   <option value="TX" >Texas (TX)</option>
                   <option value="CO" >Colorado (CO)</option>
              
              </select>

              <div class="errorTxt"></div> 
            </div> 

              
            <div class="form-group col-sm-6">

             <fieldset class="form-group form-group-lg">

              {!! Form::label('City', 'City:') !!}
              <input type="text" id="city" name="city" class="form-control" placeholder="Dallas">
              <div class="errorTxt"></div> 
            </fieldset>

            </div>
            
             

            
            </div>


            <div class="row">

            <div class="form-group col-sm-6">

              {!! Form::label('ZIP CODE', 'ZIP CODE:') !!}
             <fieldset class="form-group form-group-lg">
              
               <input type="text" id="zipcode" name="zipcode" class="form-control" placeholder="78228">
             
              <div class="errorTxt"></div> 
             
             </fieldset>
                
             </div>

            </div>

			      
			    
			   <div class="row">
					<!-- Submit Field -->
					<div class="form-group col-sm-12">

					    <button id="submitBtn" type="submit" style="margin-right: 10px;" class="btn btn-primary" ><i class="fa fa-check">&nbsp;&nbsp;</i>Save</button>
					    
					    <a id="cancelBtn" href="{!! route('admin.voter.index') !!}" class="btn btn-default"><i class="fa fa-times">&nbsp;&nbsp;</i>Cancel</a>

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

          // 'age':{

          //   required:true,
          //   number:true,
          //   rangelength: [1,3],

          // },

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
            rangelength: [15,15],
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
            rangelength: [11,11],
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



          
        },

          messages: {
          
              'email': {
                required: "Please enter the email address",
                remote: "email already in use",
          
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

              'ssn' : {
                required: "Please enter your SSN number",
                remote: "SSN number already in use",
                rangelength: "social security number should be a 9 digit number"
              },

              'name' : {

                required: "Plaese enter your name",
                rangelength: "Name should be minimum  2 characters in length",


              },

              'mobile_no' : {

                required: "Plaese enter your mobile number",
                remote: "Mobile number already in use",
                 rangelength: "Phone Number should be a 12 digit number"
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
                    },

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



       $( '#submitBtn' ).click(function(){

                              var validator = $( "#validation-form" ).validate();
                                
                              if( validator.form() ){

                                $(this).attr("disabled", true);

                                $("#cancelBtn").attr("disabled", true);
                                
                                $( this ).html('<div class="text-center"><i class="fa fa-spinner fa-spin"></i>&nbsp;&nbsp;Processing...</div>');

                                $( '#validation-form' ).submit();

                              }

                                

                        });




      $(document).ready(function(){
        $('#ssn').mask('000-00-0000');
        $('#mobile_no').mask('+1-000-000-0000');
      });

      </script>

      @endsection
