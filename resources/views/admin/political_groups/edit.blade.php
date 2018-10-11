

@extends('admin.default')

@section('content')

     <div class="px-content">
        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light"><i class="fa fa-certificate"></i>&nbsp;&nbsp;Political Group / </span> {{ $politicalGroup->title }}
                
            </h1> 
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">

                     

                    <div class="panel-heading">
                        <div class="panel-title">{{ $politicalGroup->title }}</div>
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


                     {!! Form::model($politicalGroup, ['route' => ['admin.politicalGroups.update', $politicalGroup->id], 'method' => 'patch', 'id' => 'validation-form']) !!}

                        @include('admin.political_groups.fields')

                   {!! Form::close() !!}
                    
                    </div>
                </div>
                
               
            </div>
        </div>
    </div>

@endsection


@section( 'js' )

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
          
          'title': {
            required: true,
       
          },
          // 'description': {
          //   //required: true,
          //   rangelength: [20,200],
            
          // },

          // 'symbol':{

          //   required:true,
          //   maxlength: 20,

          // },
         
          // 'founder': {
          //   required: true,
          //   alphaspaces: true,
          //   rangelength: [6,20],
          // },

          

         // 'election_id' : {
         //    required: true
         //  }
        },

          messages: {
          
             
              // 'symbol' : {
              //   required: "Please enter group symbol",
              //   maxlength: "characters should not be greater than 20 in length",

              // },

              // 'founder' : {
              //   required: "Please enter founder name",
              //   rangelength: "name should be in the length of 2 to 20 characters",

              // },

              'title' : {

                required: "Select political group",
               

              },

              // 'description' : {

              //   //required: "Plaese enter description",
              //   rangelength: "description should be in the length of 20 to 500 characters",


              // },


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

       var dateToday = new Date();


        
      $('#year').daterangepicker({
        
        singleDatePicker: true,
        showDropdowns: true,
        

      });


       // Initialize Select2
    $(function() {
      $('.select2-example').select2({
        placeholder: 'Select political group',
      });
    });


      </script>

      @endsection