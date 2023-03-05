
<div class="row">
    <div class="form-group col-sm-8" style="margin-top: 40px;">
        {!! Form::label('title', 'Modul mazmuni nomlanishini qisqa qilib yozing:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    
    <!-- Img Field -->
    <div class="form-group col-sm-4">
        <div class="col-md-12 mb-2">
            @if($modulMazmuni->img)
                <img style="width: 80%" id="image_preview_container" src="/image/{{$modulMazmuni->img}}"
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

<div class="row">
    <!-- File Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('file', "Yuklanishi kerak bo'lgan faylni yuklang:") !!}
        {!! Form::file('file') !!}
    </div>

    <div class="form-group col-sm-4">
        {!! Form::label('category', "Modul mazmuni bo'limini tanlang:") !!}
        {!! Form::select('category', [
        'mavular' => 'Mavzular',
        'tagdimotlar' => "Tag'dimotlar",
        'video_darslar' => "Video darslar",
        'oqish_uchun_tafsiya' => "O'qish uchun tafsiya qilingan manbalar",
        'maqola_va_tezislar' => "Maqola va tezislar",
        'ilmiy_ishlar' => "Ilmiy ishlar",
        'meyoriy_hujjatlar' => "Meyoriy hujjatlar",
        'shaxsiy_hujjatlar' => "Shaxsiy hujjatlar",
       
    ], null, ['class' => 'form-control']) !!}
     </div>
   <!-- Url Content Field -->
<div class="form-group col-sm-5">
    {!! Form::label('url_content', "Faylni boshqa manzildan ko'rsatish:") !!}
    {!! Form::text('url_content', null, ['class' => 'form-control', 'placeholder' => "https://youtube.com/ yoki boshqa sayt"]) !!}
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


<div class="row">
        <!-- Is Ready Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('is_active', 'Mazmun chop etish uchun tayyormi?:') !!}
        <label class="checkbox-inline">
            {!! Form::hidden('is_active', 0) !!}
            {!! Form::checkbox('is_active', '1', null) !!}
        </label>
    </div>

    @if(Auth::user()->hasRole('Admin') or Auth::user()->hasRole('Moderator'))
    <div class="form-group col-sm-6">
        {!! Form::label('is_ready', "Moderatsiyadan o'tdimi?:") !!}
        <label class="checkbox-inline">
            {!! Form::hidden('is_ready', 0) !!}
            {!! Form::checkbox('is_ready', '1', null) !!}
        </label>
    </div>    
    @endif

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
    <a href="{{ route('modulMazmunis.index') }}" class="btn btn-secondary">Safidan chiqib ketish</a>
</div>
