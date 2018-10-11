<div class="row">
<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Donald']) !!}

    <div class="errorTxt"></div> 
</div>

<!-- Age Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('age', 'Age:') !!}
    {!! Form::text('age', null, ['class' => 'form-control', 'placeholder' => '40']) !!}

    <div class="errorTxt"></div> 
</div> -->

</div>

<div class="row">
<!-- Election Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('political_group_id', 'Political Group') !!}
    
    <select class="form-control select2-example" id="political_group_id" name="political_group_id">
         
         <option value="" >Select Value</option>
         
         @foreach( $politicalGroups as $pg )   



         <option value="{{ $pg->id }}" <?php 
                                                    if( isset($participant) ) 
                                                    echo ( $pg->id == $participant->political_group_id )?'selected':''
                                                     ?> >{{ $pg->title }}</option>

         @endforeach
    </select>

    <div class="errorTxt"></div> 

</div>
</div>


<div class="row">
<!-- Submit Field -->
<div class="form-group col-sm-12">

    
    
    @if( isset( $participant ) )
    
    <button type="submit" style="margin-right: 10px;" class="btn btn-primary" ><i class="fa fa-refresh">&nbsp;&nbsp;</i>Update</button>

    @else

    <button type="submit" style="margin-right: 10px;" class="btn btn-primary" ><i class="fa fa-check">&nbsp;&nbsp;</i>Save</button>
    @endif

    <a href="{!! route('admin.participants.index') !!}" class="btn btn-default"><i class="fa fa-times">&nbsp;&nbsp;</i>Cancel</a>
</div>

</div>