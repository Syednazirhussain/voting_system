@extends( 'admin.default' )

@section( 'content' )

    
   

     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="ionicons ion-person-stalker"></i>&nbsp;&nbsp;Election / </span>Add</h1>
        </div>

         @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
        @endif

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Add Election</div>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'admin.election.store', 'id' => 'validation-form' ]) !!}

                        @include('admin.elections.fields')

                        {!! Form::close() !!}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection


      
@section('js')
  
  <script type="text/javascript">
    
      
      
   
      $.validator.addMethod("enddate", function(value, element) {
    
      var startdatevalue = $('.startdate').val();

      value             = Date.parse(value);
      startdatevalue    = Date.parse(startdatevalue);  

      console.log("Start "+startdatevalue);
      console.log("End "+value);


      return startdatevalue < value;
      }, "End Date should be greater than Start Date.");
     

            
    // jQuery.validator.addMethod("alphaspaces", function(value, element) {
    //         return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
          
    //         }, "use alphabets only");



    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });   
      
      // Initialize validator
      $('#validation-form').validate({
        focusInvalid: false,
        
        rules: {
          'title': {
            required: true,
            rangelength: [2,50],
            
          },
          
          // 'election_year': {
          //   required: true,
          //   date: true,
          //   dateFormat: true
          // },
         
          // 'voting_start': {
          //   enddate: true,
          //   //rangelength: [6,190],
          // },

          // 'voting_end': {
          //   enddate: true,
            
          // },

          'description': {
            //required: true,
            rangelength: [20,500],

          },

          'election_participant_ids[]' : {
            required: true,

            
          },

           


        },


        messages: {
          
              'title': {
                required: "Please enter title",
                rangelength: "title must be greater than 2",
                
              },

            
            
            'election_participant_ids[]': {
            required: "Select atleast one Participant",
           
            },
              // 'election_year': {
              //   required: "Please select year",
              //   //rangelength: "Please enter a value between 6 and 100 characters long."
              // },

              // 'voting_start': {
              //   required: "Select Voting Start Time",
                
              // },


              // 'remote': {
              //   required: "Select Voting End Time",
                
              // },


              'description': {
                rangelength: "Description should be in the length of 20 to 500 characters",
                
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

        var dateToday = new Date();


        // Initialize Select2
        $(function() {
          $('.select2-example').select2({
            placeholder: 'Select Participants',
          });
        });
      
       $('#voting_start').daterangepicker({
        
        timePicker: true,
        singleDatePicker: true,
        showDropdowns: true,
        timePicker24Hour:true,
        minDate: dateToday,

        locale: {
        format: 'MM-DD-YYYY HH:mm'
        },

         



      });

       $('#voting_end').daterangepicker({
        
        timePicker: true,
        singleDatePicker: true,
        showDropdowns: true,
        timePicker24Hour:true,
        minDate: dateToday,
        locale: {
        format: 'MM-DD-YYYY HH:mm'
        },

         

      });
  </script>

  @endsection