



@extends('admin.default')

@section('content')
 
    <div class="px-content">
        <div class="page-header">
            <h1><i class="fa fa-edit"></i>&nbsp;&nbsp;Voters </h1>
        </div>

        <div class="panel">
            <div class="panel-body">

        @include('flash::message')

                <div class="text-right m-b-3">
                    <a href="{!! route('admin.voter.create') !!}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
                </div>

                <div class="table-primary">

                    <table class="table table-responsive" id="datatables">
    <thead>
        <tr>
            <th>Name</th>
	        <th>Email</th>
	        <th>Mobile No</th>	
	        <th>Social Security Number</th>
            <th>Age </th>
            <th>Gender</th>
            <th>State</th>
            <th>City</th>
            <th >Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! ucfirst( $user->name ) !!}</td>            
            <td>{!! $user->email !!}</td>
            <td>{!! $user->mobile_no !!}</td>
            <td>{!! $user->ssn !!}</td>
            <td>{!! $user->age !!} years</td>
            <td>{!! $user->gender !!}</td>
            <td><?php 
                switch ( $user->state ) {
                    
                    case 'WA':
                        echo "Washington";
                        break;

                    case 'OR':
                        echo "Oregon";
                        break; 

                    case 'CA':
                        echo "California";
                        break; 

                    case 'ID':
                        echo "Idaho";
                        break;    
                    case 'UT':
                        echo "Utah";
                        break; 

                    case 'NV':
                        echo "Nevada";
                        break;

                    case 'AZ':
                        echo "Arizona";
                        break;

                    case 'NM':
                        echo "New Mexico";
                        break; 

                    case 'TX':
                        echo "Texas";
                        break; 

                    case 'CO':
                        echo "Colorado";
                        break;                
                } 

            ?></td>
            <td>{!! ucfirst( $user->city ) !!}</td>
            <td width="100px" class="center text-center padding-t-20">

                <form method="post" action="{{ route('admin.voter.destroy',['id' => $user->id ]) }}" accept-charset="UTF-8">
                    
                    <input name="_method" type="hidden" value="DELETE">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"> 
            			
                    <a href="{{ route('admin.voter.edit', [ 'id' => $user->id]) }}"><i class="fa fa-edit fa-lg text-info icon-set"></i></a>

                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                </form>
            </td>

           
        </tr>
    @endforeach
    </tbody>
</table>	



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
            $('#datatables_wrapper .table-caption').text('Voters');
            $('#datatables_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
        });
    </script>
@endsection
