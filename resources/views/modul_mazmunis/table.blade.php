<div class="table-responsive-sm">
    <table class="table table-striped" id="modulMazmunis-table">
        <thead>
            <tr>
                <th>Mavzular nomi</th>    
                <th>Bo'limi</th>
                <th>Holati</th>
                <th>Holati</th>
                <th>Yaratilgan sana</th>
                <th colspan="3">Amallar</th>
            </tr>
        </thead>
        <tbody>
        @foreach($modulMazmunis as $modulMazmuni)      
       
            @if($modulMazmuni->is_private == 1 or $modulMazmuni->user_id == Auth::user()->id or Auth::user()->hasRole('Admin'))                
            <tr>
                <td>
                    @if($modulMazmuni->is_private or $modulMazmuni->user_id == Auth::user()->id or Auth::user()->hasRole('Admin'))
                        <a href="{{ route('modulMazmunis.show', [$modulMazmuni->id]) }}"><b>{{ $modulMazmuni->title }}</b></a>
                    @else
                        {{ $modulMazmuni->title }}
                    @endif
                </td>
                <td>
                    @if($modulMazmuni->category == "mavular")
                        Mavzular
                    @elseif($modulMazmuni->category == "tagdimotlar")
                        Tag'dimotlar
                    @elseif($modulMazmuni->category == "video_darslar")
                        Video darslar
                    @elseif($modulMazmuni->category == "oqish_uchun_tafsiya")
                        O'qish uchun tafsiya qilingan manbalar
                    @elseif($modulMazmuni->category == "maqola_va_tezislar")
                        Maqola va tezislar
                    @elseif($modulMazmuni->category == "ilmiy_ishlar")
                        Ilmiy ishlar
                    @elseif($modulMazmuni->category == "meyoriy_hujjatlar")
                        Meyoriy hujjatlar
                    @elseif($modulMazmuni->category == "shaxsiy_hujjatlar")
                        Shaxsiy hujjatlar
                    @else
                        Bo'lim topilmadi!
                    @endif
                </td>
                <td>
                    @if($modulMazmuni->is_active == 1)
                        <p class="btn btn-success btn-sm">Aktiv</p>
                    @else
                        <p class="btn btn-danger btn-sm">No Aktiv</p>
                    @endif

                    {{-- @if($modulMazmuni->user_id == Auth::user()->id or Auth::user()->hasRole('Admin'))
                        @if($modulMazmuni->is_moderate)
                            <p class="btn btn-success btn-sm">Tasdiqlangan</p>
                        @else
                            <p class="btn btn-danger btn-sm">Tasdiqlanmagan</p>
                        @endif               
                    @endif    --}}  
                </td>                       
                <td>
                    @if($modulMazmuni->is_private)
                        <p class="btn btn-warning btn-sm text-white"><b>Shaxsiy!</b></p>
                    @else
                        <p class="btn btn-info btn-sm text-white"><b>Ochiq manba!</b></p>
                    @endif    
                </td>   
                <td>{{ $modulMazmuni->created_at }}</td>
                <td>
                    {!! Form::open(['route' => ['modulMazmunis.destroy', $modulMazmuni->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @if($modulMazmuni->is_private or $modulMazmuni->user_id == Auth::user()->id or Auth::user()->hasRole('Admin'))
                        <a href="{{ route('modulMazmunis.show', [$modulMazmuni->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        @endif                       
                        @if($modulMazmuni->user_id == Auth::user()->id or Auth::user()->hasRole('Admin'))
                        <a href="{{ route('modulMazmunis.edit', [$modulMazmuni->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Qaroriz qatiymi?')"]) !!}
                        @endif
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>