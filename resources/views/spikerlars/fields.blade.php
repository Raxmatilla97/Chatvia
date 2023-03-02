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

<div class="row">
    <!-- Img Field -->
    <div class="form-group col-sm-4">
        <div class="col-md-4 mb-2">
        <img id="image_preview_container" src="{{ asset('storage/default.jpg') }}"
        alt="preview image" style="max-height: 150px;">
    </div>
        {!! Form::label('img', 'Spiker suratini yuklang:') !!}
        {!! Form::file('img',['id' => 'image', 'multiple', 'data-allow-reorder' => 'true', 'data-max-file-size' => '3MB', 'data-max-files' => '1']) !!}
    </div>
    <div class="clearfix"></div>

<!-- About Field -->
<div class="form-group col-sm-8 col-lg-8">
    {!! Form::label('about', 'Spiker haqida qisqacha:') !!}
    {!! Form::textarea('about', null, ['class' => 'form-control']) !!}
</div>

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



<script>
    $(document).ready(function (e) {
   
   $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
   });
  
   $('#image').change(function(){
           
    let reader = new FileReader();

    reader.onload = (e) => { 

      $('#image_preview_container').attr('src', e.target.result); 
    }

    reader.readAsDataURL(this.files[0]); 
  
   });
  
//    $('.upload_image_form').submit(function(e) {

//      e.preventDefault();
  
//      var formData = new FormData(this);
  
//      $.ajax({
//         type:'POST',
//         url: "{{ url('photo')}}",
//         data: formData,
//         cache:false,
//         contentType: false,
//         processData: false,
//         success: (data) => {
//            this.reset();
//            alert('Surat yuklandi!');
//         },
//         error: function(data){
//            console.log(data);
//          }
//        });
//    });
});
</script>
