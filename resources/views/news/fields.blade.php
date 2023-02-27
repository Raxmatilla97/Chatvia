<!-- Title Field -->



<div class="row">
    <div class="form-group col-sm-8">
        {!! Form::label('title', 'Yangilikning nomlanishini qisqa qilib yozing:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    
    <!-- Img Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('img', 'Yangilik suratini yuklang:') !!}
        {!! Form::file('img',['id' => 'image', 'multiple', 'data-allow-reorder' => 'true', 'data-max-file-size' => '3MB', 'data-max-files' => '1']) !!}
    </div>
    <div class="clearfix"></div>
   
</div>

<div class="col-md-12 mb-2">
    <img id="image_preview_container" src="{{ asset('storage/image/image-preview.png') }}"
        alt="preview image" style="max-height: 150px;">
</div>


<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', 'Asosiy qismini yozing:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'classic-ckeditor5']) !!}

    <script>
        CKEDITOR.replace( 'content' );
    </script>
</div>

<!-- Is Ready Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_ready', 'Yangilik chop etish uchun tayyormi?:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_ready', 0) !!}
        {!! Form::checkbox('is_ready', '1', null) !!}
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Yangilikni yaratish', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('news.index') }}" class="btn btn-secondary float-right">Chiqib ketish</a>
</div>

<script>
//     $(document).ready(function (e) {
   
//    $.ajaxSetup({
//        headers: {
//            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//    });
  
//    $('#image').change(function(){
           
//     let reader = new FileReader();

//     reader.onload = (e) => { 

//       $('#image_preview_container').attr('src', e.target.result); 
//     }

//     reader.readAsDataURL(this.files[0]); 
  
//    });
  
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
