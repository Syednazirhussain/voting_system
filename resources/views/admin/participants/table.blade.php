<table class="table table-responsive" id="datatables">
    <thead>
        <tr>
            <th>Name</th>
        <!-- <th>Age</th>
        <th>Mobile No</th>
        <th>Email</th> -->
        <!-- <th>Password</th> -->
        <th>Political Group</th>
        <!-- <th>Social Security Number</th> -->
            <th >Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($participants as $participant)
        <tr>
            <td>{!! ucfirst( $participant->name ) !!}</td>
           <!--  <td>{!! $participant->age !!}</td>
            <td>{!! $participant->mobile_no !!}</td>
            <td>{!! $participant->email !!}</td> -->
           <!--  <td>{!! $participant->password !!}</td> -->
            
            @foreach( $politicalGroups as $pg )

                @if( $pg->id == $participant->political_group_id )

                 <td>{!! $pg->title !!}</td>
            
                @endif
            @endforeach
           <!--  <td>{!! $participant->ssn !!}</td> -->
           

            <td width="100px" class="center text-center padding-t-20">

                <form method="post" action="{{ route('admin.participants.destroy', [$participant->id]) }}" accept-charset="UTF-8">
                    <input name="_method" type="hidden" value="DELETE">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"> 
            
                    <a href="{{ route('admin.participants.edit', [$participant->id]) }}"><i class="fa fa-edit fa-lg text-info icon-set"></i></a>

                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>