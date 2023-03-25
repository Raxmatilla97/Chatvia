<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $onlineVideolar->title }}</p>
</div>

<!-- Youtube Field -->
<div class="form-group">
    {!! Form::label('youtube', 'Youtube:') !!}
    <p>{{ $onlineVideolar->youtube }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $onlineVideolar->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $onlineVideolar->updated_at }}</p>
</div>

