<table class="table table-responsive" id="datatables">
    <thead>
        <tr>
            <!-- <th>Election</th> -->
        <th>Title</th>
        <!-- <th>Description</th> -->
        <!-- <th>Symbol</th>
        <th>Founder</th>
        <th>Year</th> -->
            <!-- <th >Action</th> -->
        </tr>
    </thead>
    <tbody>


    @foreach($politicalGroups as $politicalGroup)
        <tr>
            
            

            <td>{!! ucfirst($politicalGroup->title) !!}</td>



            <!--  <td width="100px" class="center text-center padding-t-20">

                <form method="post" action="{{ route('admin.politicalGroups.destroy', [$politicalGroup->id]) }}" accept-charset="UTF-8">
                    <input name="_method" type="hidden" value="DELETE">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"> 
            
                    <a href="{!! route('admin.politicalGroups.edit', [$politicalGroup->id]) !!}"><i class="fa fa-edit fa-lg text-info icon-set"></i></a>

                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                </form>
            </td>     -->


              
        </tr>
    @endforeach
    </tbody>
</table>