<div class="row">

<!-- Fish Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fish', 'Fish:') !!}
    {!! Form::text('fish', null, ['class' => 'form-control']) !!}
</div>

<!-- Ish Joyi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ish_joyi', 'Ish Joyi:') !!}
    {!! Form::text('ish_joyi', null, ['class' => 'form-control']) !!}
</div>

</div>


<!-- About Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('about', 'Spiker haqida qisqacha:') !!}
    {!! Form::textarea('about', null, ['class' => 'form-control']) !!}
</div>
   <!-- Is Ready Field -->
   <div class="form-group col-sm-6">
    {!! Form::label('is_active', 'Spiker sahifaga uchun tayyormi?:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_active', 0) !!}
        {!! Form::checkbox('is_active', '1', null) !!}
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Spikerni saqlash', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('spikerlars.index') }}" class="btn btn-secondary">Sahifani yopish</a>
</div>
<style>
    input[type=checkbox] {
        width:3vw;
        height:3vh;
    }
    </style>