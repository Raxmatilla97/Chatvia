
<div class="row col-sm-12 col-lg-12">
    <div class="form-group col-sm-8" style="margin-top: 40px;">
        {!! Form::label('title', 'Modul mazmuni nomlanishini qisqa qilib yozing:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    
    <!-- Img Field -->
    <div class="form-group col-sm-4">
        <div class="col-md-12 mb-2">
            @if( isset($onlineVideoDars->img))
                <img style="width: 80%" id="image_preview_container" src="{{ asset('image')}}/{{$onlineVideoDars->img}}"
                alt="preview image" style="max-height: 150px;">
            @else
                <img style="width: 80%" id="image_preview_container" src="{{ asset('storage/default.jpg') }}"
                alt="preview image" style="max-height: 150px;">
            @endif
       
    </div>
        {!! Form::label('img', 'Suratini yuklang:') !!}
        {!! Form::file('img',['id' => 'image', 'multiple', 'data-allow-reorder' => 'true', 'data-max-file-size' => '3MB', 'data-max-files' => '1']) !!}
    </div>
    <div class="clearfix"></div>
   
</div>

<div class="row col-sm-12 col-lg-12">
   
    {{-- style="top: -100px;" --}}
    <div class="form-group col-sm-4" >
        {{-- <input name="qachon_boladi" data-date-format="dd/mm/yyyy" id="datepicker"> --}}
        {!! Form::label('qachon_boladi', "Online dars qachon bo'lishini belgilang:") !!}
        {!! Form::text('qachon_boladi', null, ['class' => 'form-control', 'id' => 'datetimepicker3']) !!}

        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script><script type="text/javascript">
            $('#datepicker').datepicker({
                dateFormat: "yy-mm-dd",
            timeFormat:  "hh:mm:ss",
                weekStart: 1,
                daysOfWeekHighlighted: "6,0",
                autoclose: true,
                todayHighlight: true,
            });
            
            $('#datepicker').datepicker("setDate", new Date());
        </script> --}}
        <link rel="stylesheet" type="text/css" href="https://www.jqueryscript.net/demo/Clean-jQuery-Date-Time-Picker-Plugin-datetimepicker/jquery.datetimepicker.css"/>
        
        {{-- <input type="text" id="datetimepicker3"/> --}}

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://www.jqueryscript.net/demo/Clean-jQuery-Date-Time-Picker-Plugin-datetimepicker/jquery.datetimepicker.js"></script>
        <script>$('#datetimepicker_mask').datetimepicker({
            mask:'9999/19/39 29:59',
        });
        $('#datetimepicker').datetimepicker();
        $('#datetimepicker').datetimepicker({value:'2015/04/15 05:06'});
        $('#datetimepicker1').datetimepicker({
            datepicker:false,
            format:'H:i',
            step:5
        });
        $('#datetimepicker2').datetimepicker({
            timepicker:false,
            format:'d/m/Y',
            formatDate:'Y/m/d',
            minDate:'-1970/01/02', // yesterday is minimum date
            maxDate:'+1970/01/02' // and tommorow is maximum date calendar
        });
        $('#datetimepicker3').datetimepicker({
            inline:true
        });
        $('#datetimepicker4').datetimepicker();
        $('#open').click(function(){
            $('#datetimepicker4').datetimepicker('show');
        });
        $('#close').click(function(){
            $('#datetimepicker4').datetimepicker('hide');
        });
        $('#datetimepicker5').datetimepicker({
            datepicker:false,
            allowTimes:['12:00','13:00','15:00','17:00','17:05','17:20','19:00','20:00']
        });
        $('#datetimepicker6').datetimepicker();
        $('#destroy').click(function(){
            if( $('#datetimepicker6').data('xdsoft_datetimepicker') ){
                $('#datetimepicker6').datetimepicker('destroy');
                this.value = 'create';
            }else{
                $('#datetimepicker6').datetimepicker();
                this.value = 'destroy';
            }
        });
            </script>
    </div>
       
   
   <!-- Url Content Field -->
<div class="form-group col-sm-8">
    {!! Form::label('yutube_video_url', "Faylni boshqa manzildan ko'rsatish:") !!}
    {!! Form::text('yutube_video_url', null, ['class' => 'form-control', 'placeholder' => "https://youtube.com/ yoki boshqa sayt"]) !!}
</div>
    
    <div class="clearfix"></div>
</div>

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', "Asosiy qism:") !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>

<script>
    CKEDITOR.replace( 'content' );
</script>


<div class="row col-sm-12 col-lg-12">
        <!-- Is Ready Field -->
    <div class="form-group col-sm-6 ">
        {!! Form::label('is_active', "Resurs boshqalar ko'rishi uchun tayyormi?:", ['style' => 'margin-right: 10px;']) !!}
        <label class="checkbox-inline switch-lg switch-label switch-pill switch-success"  style="margin-right: 10px;">
            {!! Form::hidden('is_active', 0) !!}
            {!! Form::checkbox('is_active', '1', null, ['class' => 'switch-input']) !!}
            <span style=" margin-top: 15px;" class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
        </label>
    </div>
</div>
   

<style>
input[type=checkbox] {
    width:3vw;
    height:3vh;
}
</style>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Saqlash', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('onlineVideoDars.index') }}" class="btn btn-secondary">Safidan chiqib ketish</a>
</div>


<script>
    $(document).ready(function (e) {
 
  
   $('#image').change(function(){
           
    let reader = new FileReader();

    reader.onload = (e) => { 

      $('#image_preview_container').attr('src', e.target.result); 
    }

    reader.readAsDataURL(this.files[0]); 
  
   });
});
</script>
