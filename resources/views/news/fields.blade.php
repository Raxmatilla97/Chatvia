<!-- Title Field -->
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('title', 'Yangilikning nomlanishini qisqa qilib yozing:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    
    <!-- Img Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('img', 'Yangiliks uratini yuklang:') !!}
        {!! Form::file('img',['id' => 'image', 'multiple', 'data-allow-reorder' => 'true', 'data-max-file-size' => '3MB', 'data-max-files' => '1']) !!}
    </div>
    <div class="clearfix"></div>
   
</div>


<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', 'Asosiy qism:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Ready Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_ready', 'Is Ready:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_ready', 0) !!}
        {!! Form::checkbox('is_ready', '1', null) !!}
    </label>
</div>


<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    {!! Form::text('created_at', null, ['class' => 'form-control','id'=>'created_at']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#created_at').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
@endpush


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('news.index') }}" class="btn btn-secondary">Cancel</a>
</div>
