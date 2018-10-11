






<div class="row">

<!-- Title Field -->
<div class="form-group col-sm-12">
    {!! Form::label('Political Groups', 'Title:') !!}
   
    <select class="form-control select2-example" id="title" name="title">
         
         <option value="" >Select Political Group</option>
         <option value="democratic"

         <?php 

         if( isset( $politicalGroup ) ) {

            if( $politicalGroup->title == "democratic" ) {

                echo "selected";

            }
        }
         ?>

         >DEMOCRATIC PARTY</option>
         <option value="republican"

        <?php 
            if( isset( $politicalGroup ) ) {


            if( $politicalGroup->title == "republican" ) {

                echo "selected"; 
            }          

            }

         ?> >REPUBLICAN PARTY</option>
         
    </select>

    <div class="errorTxt"></div> 
</div>

</div>


 <div class="row">

<!-- Submit Field -->
<div class="form-group col-sm-12">

    
    
    @if( isset( $politicalGroup ) )
    
    <button type="submit" style="margin-right: 10px;" class="btn btn-primary" ><i class="fa fa-refresh">&nbsp;&nbsp;</i>Update</button>

    @else

    <button type="submit" style="margin-right: 10px;" class="btn btn-primary" ><i class="fa fa-check">&nbsp;&nbsp;</i>Save</button>
    @endif

    <a href="{!! route('admin.politicalGroups.index') !!}" class="btn btn-default"><i class="fa fa-times">&nbsp;&nbsp;</i>Cancel</a>
</div>

</div>


