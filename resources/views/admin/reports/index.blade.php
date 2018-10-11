@extends( 'admin.default' )

  @section( 'content' )

  
  



   <div class="px-content">


    <div class="page-header">
      <div class="row">
        <div class="col-md-4 text-xs-center text-md-left text-nowrap">
          <h1><i class="fa fa-file-o"></i>&nbsp;&nbsp;Report of "{{ $election_title }}"</h1>


          @if( isset($_GET['state'] ) && $_GET['state'] != 'all' )

          <p>Showing results for <strong>"<?php 

          switch ($_GET['state']) {
            
            case 'WA':
              echo "Washington (WA)";
              break;
            
           case 'OR':
             echo "Oregon (OR)";
           break;

           case 'CA':
             echo "California (CA)";
           break;

           case 'ID':
             echo "Idaho (ID)";
           break;

           case 'UT':
             echo "Utah (UT)";
           break;


           case 'NV':
             echo "Nevada (NV)";
           break;


           case 'AZ':
             echo "Arizona (AZ)";
           break;

           case 'NM':
             echo "New Mexico (NM)";
           break;

           case 'TX':
             echo "Texas (TX)";
           break;

           case 'CO':
             echo "Colorado (CO)";
           break;
           
          } ?>"</strong></h6>

          @endif  
        </div>

        <form method="GET" action="{{ route( 'admin.reports', last(request()->segments())  ) }}">
        <div class="form-group col-md-4">
             
            
              
              <select class="form-control select2-example" id="state" name="state">
                   
                   <option value="all" >All States</option>
                   <option value="WA" 
                   <?php echo ( isset($_GET['state']) && $_GET['state'] == "WA" )?"SELECTED":"" ?>  
                   >Washington (WA)</option>

                   <option value="OR" 
                   <?php echo ( isset($_GET['state']) && $_GET['state'] == "OR" )?"SELECTED":"" ?>
                   >Oregon (OR)</option>

                   <option value="CA" 
                   <?php echo ( isset($_GET['state']) && $_GET['state'] == "CA" )?"SELECTED":"" ?>
                   >California (CA)</option>

                   <option value="ID" 
                   <?php echo ( isset($_GET['state']) && $_GET['state'] == "ID" )?"SELECTED":"" ?>
                   >Idaho (ID)</option>

                   <option value="UT" 
                   <?php echo ( isset($_GET['state']) && $_GET['state'] == "UT" )?"SELECTED":"" ?>
                   >Utah (UT)</option>

                   <option value="NV" 
                   <?php echo ( isset($_GET['state']) && $_GET['state'] == "NV" )?"SELECTED":"" ?>
                   >Nevada (NV)</option>

                   <option value="AZ" 
                   <?php echo ( isset($_GET['state']) && $_GET['state'] == "AZ" )?"SELECTED":"" ?>
                   >Arizona (AZ)</option>

                   <option value="NM" 
                   <?php echo ( isset($_GET['state']) && $_GET['state'] == "NM" )?"SELECTED":"" ?>
                    >New Mexico (NM)</option>

                   <option value="TX" 
                   <?php echo ( isset($_GET['state']) && $_GET['state'] == "TX" )?"SELECTED":"" ?>
                   >Texas (TX)</option>

                   <option value="CO" 
                   <?php echo ( isset($_GET['state']) && $_GET['state'] == "CO" )?"SELECTED":"" ?>
                   >Colorado (CO)</option>
              
              </select>

             
          </div>

          <div class="form-group col-md-1"> 
              <button type="submit" class="btn btn primary">GO</button>
          </div>

          <form> 
          
          @if(isset( $winner ) && !empty($winner) )

          <div class="form-group col-md-3"> 
              <a href="#" class="box bg-danger">
                <div class="box-cell p-a-3 valign-middle">
                  <i class="box-bg-icon middle right ion-arrow-graph-up-right"></i>


                  <span class="font-size-15">WINNER OF THE ELECTION</span><br>
                  <span class="font-size-24"><strong>@if( isset($winner['name']) ){{ $winner['name'] }} @endif</strong></span><br>
                  <span class="font-size-15">@if( isset( $winner['party'] ) ){{ $winner['party'] }}@endif</span>
                </div>
              </a>
          </div>

          @endif
        <hr class="page-wide-block visible-xs visible-sm">

                       
      </div>
    </div>

    <div class="panel">
        <div class="panel-body">

        
     
         

    <div class="row">

        <div class="col-md-6">
        <div class="panel">
          <div class="panel-title text-center">{{ "OVERALL" }}</div>
          <hr>

          <div class="panel-body overallDiv">
            <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            <canvas id="chart-pie1" width="604" height="377" class="chartjs-render-monitor" style="display: block; width: 604px; height: 377px;"></canvas>
          </div>
        </div>
      </div> 

      

      <div class="col-md-6">
        <div class="panel">
          <div class="panel-title text-center">{{ "MALE" }}</div>
          <hr>

          <div class="panel-body maleDiv"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            <canvas id="chart-pie2" width="604" height="377" class="chartjs-render-monitor" style="display: block; width: 604px; height: 377px;"></canvas>
          </div>
        </div>
      </div> 

      </div>
      
      <div class="row">
      
          <div class="col-md-6">
        <div class="panel">
          <div class="panel-title text-center">{{ "FEMALE" }}</div>
          <hr>

          <div class="panel-body femaleDiv"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            <canvas id="chart-pie3" width="604" height="377" class="chartjs-render-monitor" style="display: block; width: 604px; height: 377px;"></canvas>
          </div>
        </div>
      </div> 


         <div class="col-md-6">
        <div class="panel">
          <div class="panel-title text-center ">{{ "NOT DISCLOSED" }}</div>
          <hr>

          <div class="panel-body notDisclosedDiv"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            <canvas id="chart-pie4" width="604" height="377" class="chartjs-render-monitor" style="display: block; width: 604px; height: 377px;"></canvas>
          </div>
        </div>
      </div> 
    </div>


      <div class="row">

        <div class="col-md-6">
        <div class="panel">
          <div class="panel-title text-center">{{ "AGE BETWEEN 18 - 30" }}</div>
          <hr>

          <div class="panel-body eighteenDiv"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            <canvas id="chart-pie5" width="604" height="377" class="chartjs-render-monitor" style="display: block; width: 604px; height: 377px;"></canvas>
          </div>
        </div>
      </div>



      <div class="col-md-6">
        <div class="panel">
          <div class="panel-title text-center ">{{ "AGE BETWEEN 31 - 50" }}</div>
          <hr>

          <div class="panel-body thirtyDiv"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            <canvas id="chart-pie6" width="604" height="377" class="chartjs-render-monitor" style="display: block; width: 604px; height: 377px;"></canvas>
          </div>
        </div>
      </div>

    </div>


   <div class="row">
    
    <div class="col-md-6">
        <div class="panel">
          <div class="panel-title text-center ">{{ "AGE ABOVE 50" }}</div>
          <hr>

          <div class="panel-body fiftyDiv"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            <canvas id="chart-pie7" width="604" height="377" class="chartjs-render-monitor" style="display: block; width: 604px; height: 377px;"></canvas>
          </div>
        </div>
      </div>



      <div class="col-md-6">
        <div class="panel">
          <div class="panel-title text-center">{{ "OVERALL TRUN OVER" }}</div>
          <hr>

          <div class="panel-body"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            <canvas id="chart-pie8" width="604" height="377" class="chartjs-render-monitor" style="display: block; width: 604px; height: 377px;"></canvas>
          </div>
        </div>
      </div>

    </div>


    <div class="row">

      <div class="col-md-6">
        <div class="panel">
          <div class="panel-title text-center">{{ "GENDER TRUN OVER" }}</div>
          <hr>

          <div class="panel-body gendersDiv"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            <canvas id="chart-pie9" width="604" height="377" class="chartjs-render-monitor" style="display: block; width: 604px; height: 377px;"></canvas>
          </div>
        </div>
      </div>

       <div class="row">

      <div class="col-md-6">
        <div class="panel">
          <div class="panel-title text-center">{{ "AGES TRUN OVER" }}</div>
          <hr>

          <div class="panel-body agesDiv"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
            <canvas id="chart-pie10" width="604" height="377" class="chartjs-render-monitor" style="display: block; width: 604px; height: 377px;"></canvas>
          </div>
        </div>
      </div>


    </div>



    </div>  



            
         </div>
      </div>

  </div>


  @endsection

@section('js')
    <script type="text/javascript">
        // -------------------------------------------------------------------------
        // Initialize DataTables
        $(function () {
            $('#datatables').dataTable();
            $('#datatables_wrapper .table-caption').text('Reports');
            $('#datatables_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
        });


         // Initialize Select2
    $(function() {
      $('.select2-example').select2({
        placeholder: 'Select States',
      });
    });

</script>


  
      
      <script>
    
        var colors = ['orange', 'green', 'yellow', 'grey', 'brown'];

         var pieColors = [];

         // ----------------------OVERALL---------------------------------------------------
      
    // Initialize pie chart

    var overall = <?php echo json_encode($overallData); ?>;
    console.log(overall)

    if( overall.length == 0  )
    {
       $(".overallDiv").html( '<h1 class="text-center">NO VOTE CASTED</h1>' );
        // alert("EMPTY")
    }else{

    var ocs     = [];
    var ocp     = [];
    
    // console.log(overall);


    $.each(overall.overallCand,function(key,value){

      ocs.push(value.participant_name)
      
      // console.log(value.participant_name)
      // colors[Math.floor(Math.random() * colors.length)

      if( value.participant_name == "DEMOCRATIC PARTY" )
      {
          
         pieColors.push( "BLUE" );
      
      }
      else if( value.participant_name == "REPUBLICAN PARTY" ) {

        
         pieColors.push( "RED" );
      
      }else{

         pieColors.push( colors[key] );
        
      }

    });

    console.log(ocs);

    var overall_label = [];

    $.each(overall.overallPer,function(index,feild){
      overall_label.push("("+ocs[index]+" : "+feild+"%)");
    });

    
    console.log(pieColors);


    $(function() {
      var data = {
        labels: overall_label,
        datasets: [{
          data:                  overall.overallPer ,
          backgroundColor:       pieColors,
          hoverBackgroundColor:  pieColors,

        }],
      };
      new Chart(document.getElementById('chart-pie1').getContext("2d"), {
        type: 'pie',
        data: data,
        options: {
          tooltips: {
            enabled: true,
            mode: 'single',
            callbacks: {
              label: function(tooltipItem, data) {
                var allData = data.datasets[tooltipItem.datasetIndex].data;
                //var tooltipLabel = data.labels[tooltipItem.index];
                var tooltipData = allData[tooltipItem.index];
                // return tooltipLabel + ": " + tooltipData + "%";
                return tooltipData + "%";
              }
            }
          }
        }
      });
    });


 }

    //MALE
      
      var male = <?php echo json_encode($males); ?>
      
      if( male.length == 0  )
      {
      
       $(".maleDiv").html( '<h1 class="text-center">NO VOTE CASTED</h1>' );
        // alert("EMPTY")
      
      }else{


          var mcs     = [];
          var mcp     = [];
    
    // console.log(male);


    $.each(male.maleCand,function(key,value){

      mcs.push(value.participant_name)
      // console.log(value.participant_name)

      if( value.participant_name == "DEMOCRATIC PARTY" )
      {
          
         pieColors.push( "BLUE" );
      
      }
      else if( value.participant_name == "REPUBLICAN PARTY" ) {

        
         pieColors.push( "RED" );
      
      }else{

         pieColors.push( colors[key] );
        
      }
      
    });

    // console.log(mcs)


    $(function() {
      var data = {
        labels: mcs,
        datasets: [{
          data:                  male.malePer ,
          backgroundColor:      pieColors,
          hoverBackgroundColor: pieColors,
        }],
      };

      new Chart(document.getElementById('chart-pie2').getContext("2d"), {
        type: 'pie',
        data: data,
        options: {
          tooltips: {
            enabled: true,
            mode: 'single',
            callbacks: {
              label: function(tooltipItem, data) {
                var allData = data.datasets[tooltipItem.datasetIndex].data;
                var tooltipLabel = data.labels[tooltipItem.index];
                var tooltipData = allData[tooltipItem.index];
                return tooltipLabel + ": " + tooltipData + "%";
              }
            }
          }
        }
      });
    });


      }


    // ----------------------FEMALES---------------------------------------------------
      
    // Initialize pie chart

    var female = <?php echo json_encode($females); ?>
    
    
       if( female.length == 0  )
      {
      
       $(".femaleDiv").html( '<h1 class="text-center">NO VOTE CASTED</h1>' );
        // alert("EMPTY")
      
      }else{

         var fcs     = [];
         var fcp     = [];
    
          


          $.each(female.femaleCand,function(key,value){

            fcs.push(value.participant_name)
            // console.log(value.participant_name)

            if( value.participant_name == "DEMOCRATIC PARTY" )
            {
                
               pieColors.push( "BLUE" );
            
            }
            else if( value.participant_name == "REPUBLICAN PARTY" ) {

              
               pieColors.push( "RED" );
            
            }else{

               pieColors.push( colors[key] );
              
            }
            
          });

          // console.log(fcs)

      }


    $(function() {
      var data = {
        labels: fcs,
        datasets: [{
          data:                  female.femalePer,
          backgroundColor:      pieColors,
          hoverBackgroundColor: pieColors,
        }],
      };

      new Chart(document.getElementById('chart-pie3').getContext("2d"), {
        type: 'pie',
        data: data,
        options: {
          tooltips: {
            enabled: true,
            mode: 'single',
            callbacks: {
              label: function(tooltipItem, data) {
                var allData = data.datasets[tooltipItem.datasetIndex].data;
                var tooltipLabel = data.labels[tooltipItem.index];
                var tooltipData = allData[tooltipItem.index];
                return tooltipLabel + ": " + tooltipData + "%";
              }
            }
          }
        }
      });
    });




    


    // ----------------------NOT DISCLOSED---------------------------------------------------
      
    // Initialize pie chart

    var not_disclosed = <?php echo json_encode($not_disclosed); ?>
    
      // console.log(not_disclosed)

      if( not_disclosed.length == 0  )
      {
      
       $(".notDisclosedDiv").html( '<h1 class="text-center">NO VOTE CASTED</h1>' );
        // alert("EMPTY")
      
      }else{

         var ndcs     = [];
         
    
          


          $.each(not_disclosed.ndCand,function(key,value){

            ndcs.push(value.participant_name)
            // console.log(value.participant_name)

            if( value.participant_name == "DEMOCRATIC PARTY" )
            {
                
               pieColors.push( "BLUE" );
            
            }
            else if( value.participant_name == "REPUBLICAN PARTY" ) {

              
               pieColors.push( "RED" );
            
            }else{

               pieColors.push( colors[key] );
              
            }

            
          });

          // console.log(ndcs)

      }


    $(function() {
      var data = {
        labels: ndcs,
        datasets: [{
          data:                 not_disclosed.ndPer,
          backgroundColor:      pieColors,
          hoverBackgroundColor: pieColors,
        }],
      };

      new Chart(document.getElementById('chart-pie4').getContext("2d"), {
        type: 'pie',
        data: data,
        options: {
          tooltips: {
            enabled: true,
            mode: 'single',
            callbacks: {
              label: function(tooltipItem, data) {
                var allData = data.datasets[tooltipItem.datasetIndex].data;
                var tooltipLabel = data.labels[tooltipItem.index];
                var tooltipData = allData[tooltipItem.index];
                return tooltipLabel + ": " + tooltipData + "%";
              }
            }
          }
        }
      });
    });


    // ----------------------AGE  18 - 20---------------------------------------------------
      
    // Initialize pie chart

      var eighteen = <?php echo json_encode($eighteen); ?>
    
    
      if( eighteen.length == 0  )
      {
      
       $(".eighteenDiv").html( '<h1 class="text-center">NO VOTE CASTED</h1>' );
        // alert("EMPTY")
      
      }else{

         var epcs     = [];
         

          $.each(eighteen.epCand,function(key,value){

            epcs.push(value.participant_name)
            // console.log(value.participant_name)
            if( value.participant_name == "DEMOCRATIC PARTY" )
            {
                
               pieColors.push( "BLUE" );
            
            }
            else if( value.participant_name == "REPUBLICAN PARTY" ) {

              
               pieColors.push( "RED" );
            
            }else{

               pieColors.push( colors[key] );
              
            }
            
          });

          // console.log(ndcs)

      }
     


    $(function() {
      var data = {
        labels: epcs,
        datasets: [{
          data:                 eighteen.epPer,
          backgroundColor:      pieColors,
          hoverBackgroundColor: pieColors,
        }],
      };

      new Chart(document.getElementById('chart-pie5').getContext("2d"), {
        type: 'pie',
        data: data,
        options: {
          tooltips: {
            enabled: true,
            mode: 'single',
            callbacks: {
              label: function(tooltipItem, data) {
                var allData = data.datasets[tooltipItem.datasetIndex].data;
                var tooltipLabel = data.labels[tooltipItem.index];
                var tooltipData = allData[tooltipItem.index];
                return tooltipLabel + ": " + tooltipData + "%";
              }
            }
          }
        }
      });
    });




        // ----------------------AGE  31 - 50---------------------------------------------------
      
    // Initialize pie chart

      var thirty = <?php echo json_encode($thirty); ?>
    
      
      if( thirty.length == 0  )
      {
      
       $(".thirtyDiv").html( '<h1 class="text-center">NO VOTE CASTED</h1>' );
        // alert("EMPTY")
      
      }else{

         var tpcs     = [];
         

          $.each(thirty.thirtyCand,function(key,value){

            tpcs.push(value.participant_name)
            // console.log(value.participant_name)
            if( value.participant_name == "DEMOCRATIC PARTY" )
            {
                
               pieColors.push( "BLUE" );
            
            }
            else if( value.participant_name == "REPUBLICAN PARTY" ) {

              
               pieColors.push( "RED" );
            
            }else{

               pieColors.push( colors[key] );
              
            }

            
          });

          // console.log(ndcs)

      }

      


    $(function() {
      var data = {
        labels: tpcs,
        datasets: [{
          data:                 thirty.thirtyPer,
          backgroundColor:      pieColors,
          hoverBackgroundColor: pieColors,
        }],
      };

      new Chart(document.getElementById('chart-pie6').getContext("2d"), {
        type: 'pie',
        data: data,
        options: {
          tooltips: {
            enabled: true,
            mode: 'single',
            callbacks: {
              label: function(tooltipItem, data) {
                var allData = data.datasets[tooltipItem.datasetIndex].data;
                var tooltipLabel = data.labels[tooltipItem.index];
                var tooltipData = allData[tooltipItem.index];
                return tooltipLabel + ": " + tooltipData + "%";
              }
            }
          }
        }
      });
    });
    




    // ----------------------AGE  ABOVE 50---------------------------------------------------
      
    // Initialize pie chart

      var fifty = <?php echo json_encode($fifty); ?>
      
      //console.log(fifty)
    
      if( fifty.length == 0  )
      { 
      
       $(".fiftyDiv").html( '<h1 class="text-center">NO VOTE CASTED</h1>' );
        // alert("EMPTY")
        
      }else{

         var fpcs     = [];
         

          $.each(fifty.fiftyCand,function(key,value){

            fpcs.push(value.participant_name)
            // console.log(value.participant_name)

            if( value.participant_name == "DEMOCRATIC PARTY" )
            {
                
               pieColors.push( "BLUE" );
            
            }
            else if( value.participant_name == "REPUBLICAN PARTY" ) {

              
               pieColors.push( "RED" );
            
            }else{

               pieColors.push( colors[key] );
              
            }
            
          });

          // console.log(ndcs)

      }
      


    $(function() {
      var data = {
        labels: fpcs,
        datasets: [{
          data:                 fifty.fiftyPer,
          backgroundColor:      pieColors,
          hoverBackgroundColor: pieColors,
        }],
      };

      new Chart(document.getElementById('chart-pie7').getContext("2d"), {
        type: 'pie',
        data: data,
        options: {
          tooltips: {
            enabled: true,
            mode: 'single',
            callbacks: {
              label: function(tooltipItem, data) {
                var allData = data.datasets[tooltipItem.datasetIndex].data;
                var tooltipLabel = data.labels[tooltipItem.index];
                var tooltipData = allData[tooltipItem.index];
                return tooltipLabel + ": " + tooltipData + "%";
              }
            }
          }
        }
      });
    });



    // ----------------------TRUNOUT---------------------------------------------------
      
    // Initialize pie chart

      var trunout = <?php echo json_encode($trunout); ?>
    

      console.log(trunout)


    $(function() {
      var data = {
        labels: [ "VOTED", "DIDN'T VOTE" ],
        datasets: [{
          data:                 [ trunout.voteCasted, trunout.notCasted ],
          backgroundColor:      [ '#FF6384', '#36A2EB',  ],
          hoverBackgroundColor: [ '#FF6384', '#36A2EB',  ],
        }],
      };

      new Chart(document.getElementById('chart-pie8').getContext("2d"), {
        type: 'pie',
        data: data,
        options: {
          tooltips: {
            enabled: true,
            mode: 'single',
            callbacks: {
              label: function(tooltipItem, data) {
                var allData = data.datasets[tooltipItem.datasetIndex].data;
                var tooltipLabel = data.labels[tooltipItem.index];
                var tooltipData = allData[tooltipItem.index];
                return tooltipLabel + ": " + tooltipData + "%";
              }
            }
          }
        }
      });
    });



    // ----------------------GENDER TRUNOUT---------------------------------------------------
      
    // Initialize pie chart

      var genders = <?php echo json_encode($genders); ?>
    

      console.log(genders)

      if( genders.gender_male == 0 && genders.gender_female == 0 && genders.gender_not_disclosed == 0  )
      { 
      
       $(".gendersDiv").html( '<h1 class="text-center">NO VOTE CASTED</h1>' );
        // alert("EMPTY")
      
      }else{



    $(function() {
      var data = {
        labels: [ "MALES", "FEMALES", "NOT DISCLOSED" ],
        datasets: [{
          data:                 [ genders.gender_male, genders.gender_female, genders.gender_not_disclosed ],
          backgroundColor:      [ 'purple', '#FF6384', 'GREY' ],
          hoverBackgroundColor: [ 'purple', '#FF6384', 'GREY' ],
        }],
      };

      new Chart(document.getElementById('chart-pie9').getContext("2d"), {
        type: 'pie',
        data: data,
        options: {
          tooltips: {
            enabled: true,
            mode: 'single',
            callbacks: {
              label: function(tooltipItem, data) {
                var allData = data.datasets[tooltipItem.datasetIndex].data;
                var tooltipLabel = data.labels[tooltipItem.index];
                var tooltipData = allData[tooltipItem.index];
                return tooltipLabel + ": " + tooltipData + "%";
              }
            }
          }
        }
      });
    });


  }
    
    // ----------------------AGE TRUNOUT---------------------------------------------------
      
    // Initialize pie chart

      var ages = <?php echo json_encode($ages); ?>
    

      console.log(ages)

      if( ages.age_eighteen == 0 && ages.age_thirty == 0 && ages.age_fifty == 0  )
      { 
      
       $(".agesDiv").html( '<h1 class="text-center">NO VOTE CASTED</h1>' );
         // alert("EMPTY")
      
      }else{


    $(function() {
      var data = {
        labels: [ "18 - 30", "31 - 50", "ABOVE 50" ],
        datasets: [{
          data:                 [ ages.age_eighteen, ages.age_thirty, ages.age_fifty ],
          backgroundColor:      [ 'orange', 'steelblue', 'yellow' ],
          hoverBackgroundColor: [ 'orange', 'steelblue', 'yellow' ],
        }],
      };

      new Chart(document.getElementById('chart-pie10').getContext("2d"), {
        type: 'pie',
        data: data,
        options: {
          tooltips: {
            enabled: true,
            mode: 'single',
            callbacks: {
              label: function(tooltipItem, data) {
                var allData = data.datasets[tooltipItem.datasetIndex].data;
                var tooltipLabel = data.labels[tooltipItem.index];
                var tooltipData = allData[tooltipItem.index];
                return tooltipLabel + ": " + tooltipData + "%";
              }
            }
          }
        }
      });
    });

  }
    
  </script>


@endsection