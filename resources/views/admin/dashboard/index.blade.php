
@extends( 'admin.default' )

  @section( 'content' )

   <div class="px-content">


    <div class="page-header">
      <div class="row">
        <div class="col-md-4 text-xs-center text-md-left text-nowrap">
          <h1><i class="page-header-icon  ion-ios-home"></i>Dashboard</h1>
        </div>


        <hr class="page-wide-block visible-xs visible-sm">

          



                      
      </div>
    </div>


        <div class="row">

      <!-- Stats -->

      <a href="{{ route('admin.elections.index') }}">
       <div class="col-md-3">
        <div class="box bg-danger darken">
          <div class="box-cell p-x-3 p-y-1">
            <div class="font-weight-semibold font-size-12">ELECTIONS</div>
            <div class="font-weight-bold font-size-20">{{ $election_count }}</div>
            <i class="box-bg-icon middle right font-size-52 ion-ios-box"></i>
          </div>
        </div>
      </div>
      </a>

      <a href="{{ route('admin.voter.index') }}">
      <div class="col-md-3">
        <div class="box bg-info darken">
          <div class="box-cell p-x-3 p-y-1">
            <div class="font-weight-semibold font-size-12">VOTERS</div>
            <div class="font-weight-bold font-size-20">{{ $users }}</div>
            <i class="box-bg-icon middle right font-size-52 ion-ios-people"></i>
          </div>
        </div>
      </div>
      </a>
     

      
      <a href="{{ route('admin.politicalGroups.index') }}">
      <div class="col-md-3">
        <div class="box bg-success darken">
          <div class="box-cell p-x-3 p-y-1">
            <div class="font-weight-semibold font-size-12">POLITICAL GROUPS</div>
            <div class="font-weight-bold font-size-20">{{ $politicalGroups }}</div>
            <i class="box-bg-icon middle right font-size-52 fa fa-certificate"></i>
          </div>
        </div>
      </div>
      </a>

      <a href="{{ route('admin.participants.index') }}">
      
      <div class="col-md-3">
        <div class="box bg-warning darken">
          <div class="box-cell p-x-3 p-y-1">
            <div class="font-weight-semibold font-size-12">PARTICIPANTS</div>
            <div class="font-weight-bold font-size-20">{{ $participants }}</div>
            <i class="box-bg-icon middle right font-size-52 fa fa-users"></i>
          </div>
        </div>
      </div>

      </a>
      <!-- / Stats -->

    </div>
    <!-- Main COntent Goes Here -->


    <div class="row">
        
        <div class="row">
      <div class="col-md-8">

        <!-- Trending categories -->

        <div class="panel">
          <div class="panel-heading">
            <div class="panel-title">Summary of Elections</div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped valign-middle">
              <thead>
                <tr>

                <th>Elections</th>
                <th class="text-xs-right"> Voting Start</th>
                <th class="text-xs-right"> Voting End</th>
                
                <th class="text-xs-right"> Participants</th>
                
              </tr></thead>
              
              <tbody>

                @if(count($elections))

                @foreach( $elections as $election )
                <tr>
                <td><a href="#">{{ $election->title }}</a></td>
                <td class="text-xs-right">{{ $election->voting_start }}</td>
                <td class="text-xs-right">{{ $election->voting_end }}</td>
                
                <td class="text-xs-right">{{ sizeof( json_decode( $election->election_participant_ids ) ) }}</td>
                
                </tr>
                
                @endforeach

                @else
                  <tr><td colspan="5" class="text-center text-secondary">NO DATA FOUND</td></tr>
                @endif
            </tbody></table>
          </div>
        </div>

        <!-- Trending categories -->

      </div>
      <div class="col-md-4">

        <!-- References -->

        <!-- <div class="panel">
          <div class="panel-heading">
            <div class="panel-title">References</div>
          </div>

          <div class="box m-y-2">
            <div class="box-cell valign-middle text-xs-center" style="width: 60px">
              <i class="ion-social-twitter font-size-28 line-height-1 text-info"></i>
            </div>
            <div class="box-cell p-r-3">
              Twitter <span class="text-muted">-</span> <strong>40%</strong>
              <div class="progress m-b-0" style="height: 5px; margin-top: 5px;">
                <div class="progress-bar progress-bar-info" style="width: 40%"></div>
              </div>
            </div>
          </div>

          <hr class="m-a-0">

          <div class="box m-y-2">
            <div class="box-cell valign-middle text-xs-center" style="width: 60px">
              <i class="ion-social-facebook font-size-28 line-height-1 text-warning"></i>
            </div>
            <div class="box-cell p-r-3">
              Facebook <span class="text-muted">-</span> <strong>25%</strong>
              <div class="progress m-b-0" style="height: 5px; margin-top: 5px;">
                <div class="progress-bar progress-bar-warning" style="width: 25%"></div>
              </div>
            </div>
          </div>

          <hr class="m-a-0">

          <div class="box m-y-2">
            <div class="box-cell valign-middle text-xs-center" style="width: 60px">
              <i class="ion-social-googleplus font-size-28 line-height-1 text-danger"></i>
            </div>
            <div class="box-cell p-r-3">
              Google+ <span class="text-muted">-</span> <strong>5%</strong>
              <div class="progress m-b-0" style="height: 5px; margin-top: 5px;">
                <div class="progress-bar progress-bar-danger" style="width: 5%"></div>
              </div>
            </div>
          </div>

          <hr class="m-a-0">

          <div class="box m-y-2">
            <div class="box-cell valign-middle text-xs-center" style="width: 60px">
              <i class="ion-social-pinterest font-size-28 line-height-1 text-success"></i>
            </div>
            <div class="box-cell p-r-3">
              Pinterest <span class="text-muted">-</span> <strong>15%</strong>
              <div class="progress m-b-0" style="height: 5px; margin-top: 5px;">
                <div class="progress-bar progress-bar-success" style="width: 15%"></div>
              </div>
            </div>
          </div>

          <hr class="m-a-0">

          <div class="box m-y-2">
            <div class="box-cell valign-middle text-xs-center" style="width: 60px">
              <i class="ion-chatboxes font-size-28 line-height-1 text-muted"></i>
            </div>
            <div class="box-cell p-r-3">
              Other <span class="text-muted">-</span> <strong>5%</strong>
              <div class="progress m-b-0" style="height: 5px; margin-top: 5px;">
                <div class="progress-bar progress-bar-primary" style="width: 5%"></div>
              </div>
            </div>
          </div>

        </div> -->

        <!-- / References -->

      </div>
    </div>

    </div>


    </div>
        

  @endsection