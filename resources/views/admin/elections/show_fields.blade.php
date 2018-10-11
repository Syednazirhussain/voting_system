<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $election->id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{!! $election->title !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $election->description !!}</p>
</div>

<!-- Voting Start Field -->
<div class="form-group">
    {!! Form::label('voting_start', 'Voting Start:') !!}
    <p>{!! $election->voting_start !!}</p>
</div>

<!-- Voting End Field -->
<div class="form-group">
    {!! Form::label('voting_end', 'Voting End:') !!}
    <p>{!! $election->voting_end !!}</p>
</div>

<!-- Election Year Field -->
<div class="form-group">
    {!! Form::label('election_year', 'Election Year:') !!}
    <p>{!! $election->election_year !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $election->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $election->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $election->deleted_at !!}</p>
</div>

