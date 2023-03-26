<!-- Title Field -->
<div class="form-group col-sm-12">
    {!! Form::label('title', 'Videoning nomlanishi:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Youtube Field -->
<div class="form-group col-sm-12">
    {!! Form::label('youtube', 'Youtubedan manzil:') !!}
    {!! Form::text('youtube', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 " style="" >
    {!! Form::submit("Qo'shish", ['class' => 'btn btn-primary']) !!}
    <a href="{{route('onlineVideoDars.index')}}"><b>Video kurslarga qaytish</b></a>
</div>
 
