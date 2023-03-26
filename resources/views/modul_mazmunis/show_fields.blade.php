

@if($modulMazmuni->is_active == 1 and $modulMazmuni->is_moderate == 1 and $modulMazmuni->is_private == 0 or Auth::user()->hasRole('Admin') )

  @include('modul_mazmunis.show_fields_if')
@else
  @if($modulMazmuni->user_id == Auth::user()->id )
    @include('modul_mazmunis.show_fields_if')
  @else 
    <div class="docs-example">
      <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">Shaxsiy hujjatlar!</h4>
        <p>Kechirasiz, sizda bu sahifadagi ma'lumotlarni ko'rishga ruxsat berilmaydi! Bu sahifa faqat shu ma'lumotlar egasigina ko'ra oladi.</p>
        <hr>
       
      </div>
      </div>
  @endif
   
@endif
