<div class="row">

    <div class="form-group col-sm-3">     
        <img style="height: auto; width: 50%; display: block; margin-left: auto; margin-right: auto;" src="@if($spikerlar->img)
            /image/{{ $spikerlar->img }}
            @else
                {{'frontend/images/a270d270d5ca184422cf980475b99e24.gif'}}
            @endif" alt="">
    </div>

    <!-- Fish Field -->
    <div class="form-group col-sm-2" style="background-color: aliceblue;">
        {!! Form::label('fish', 'Familya Ism Sharifi:') !!}
        <p>{{ $spikerlar->fish }}</p>
    </div>

    <!-- Ish Joyi Field -->
    <div class="form-group col-sm-2" style="background-color: #f0f8ff63">
        {!! Form::label('ish_joyi', 'Ish Joyi:') !!}
        <p>{{ $spikerlar->ish_joyi }}</p>
    </div>

    <!-- About Field -->
    <div class="form-group col-sm-4" style="background-color: aliceblue;">
        {!! Form::label('about', 'Spiker haqida:') !!}
        <p>{{ $spikerlar->about }}</p>
    </div>

</div>

<style>
    label{
        text-align: center; font-weight: 700;
    }

</style>