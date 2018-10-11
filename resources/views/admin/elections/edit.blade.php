

@extends('admin.default')

@section('content')

     <div class="px-content">
        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light"><i class="ionicons ion-person-stalker"></i>&nbsp;&nbsp;Election / </span>Edit
            </h1> 
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
                        <div class="panel-title">{{ $election->title }}</div>
                    </div>
                    <div class="panel-body">
                      
                      {!! Form::model($election, ['route' => ['admin.election.update', $election->id], 'method' => 'patch', 'id' => 'validation-form']) !!}

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
      
    var d = new Date();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });   


    $.validator.addMethod("enddate", function(value, element) {
    
      var startdatevalue = $('.startdate').val();

      console.log("Start "+startdatevalue);
      console.log("End "+value);


      value             = Date.parse(value);
      startdatevalue    = Date.parse(startdatevalue);  



      return startdatevalue < value;
      }, "End Date should be greater than Start Date.");

    
      
      // Initialize validator
      $('#validation-form').validate({
        focusInvalid: false,
        rules: {
          'title': {
            required: true,
            rangelength: [2,50],
          },
         
          'description': {
            //required: true,
            rangelength: [20,500],

          },

          'election_participant_ids[]' : {
            required: true
          }


        },


         messages: {
          
              'title': {
                required: "Please enter the title",
                rangelength: "title must be greater than 2",
                
              },

           'election_participant_ids[]': {
            required: "Select atleast one participant",
            },


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


       // Initialize Select2
        $(function() {
          $('.select2-example').select2({
            placeholder: 'Select Participants',
          });
        });

       var dateToday = new Date();

        $('#voting_start').daterangepicker({
        timePicker: true,
        singleDatePicker: true,
        showDropdowns: true,
        timePicker24Hour:true,
        minDate: dateToday,
        locale: {
        format: 'MM-DD-YYYY HH:mm'
        }
      });

       $('#voting_end').daterangepicker({
        timePicker: true,
        singleDatePicker: true,
        showDropdowns: true,
        timePicker24Hour:true,
        minDate: dateToday,
        locale: {
        format: 'MM-DD-YYYY HH:mm'
        }
      });
 
     

      // $('#voting_start').daterangepicker({
        
      //   timePicker: true,
      //   singleDatePicker: true,
      //   showDropdowns: true,
      //   timePicker24Hour:true,
      //   minDate: dateToday,

      //   locale: {
      //   format: 'MM-DD-YYYY HH:mm'
      //   }
      // });

      //  $('#voting_end').daterangepicker({
        
      //   timePicker: true,
      //   singleDatePicker: true,
      //   showDropdowns: true,
      //   timePicker24Hour:true,
      //   minDate: dateToday,

      //   locale: {
      //   format: 'MM-DD-YYYY HH:mm'
      //   }
      //  });



  </script>

  @endsection