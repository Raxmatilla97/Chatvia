<div class="table-responsive-sm">
    <table class="table table-striped" id="modulMazmunis-table">
        <thead>
            <tr>
                <th>Mavzular nomi</th>    
                <th>Bo'limi</th>
                <th>Aktivligi</th>
                <th>Moderatsiya</th>               
                <th>Holati</th>
                <th>Yaratilgan sana</th>
                <th colspan="3">Amallar</th>
            </tr>
        </thead>
        <tbody>
        @foreach($modulMazmunis as $modulMazmuni)
            <tr>
                <td>{{ $modulMazmuni->title }}</td>
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
                    @if($modulMazmuni->is_active)
                    <p class="btn btn-success btn-sm">Aktiv</p>
                   @else
                    <p class="btn btn-danger btn-sm">No Aktiv</p>
                   @endif
                 
                </td>
                <td>
                    @if($modulMazmuni->is_ready)
                    <p class="btn btn-success btn-sm">Tasdiqlangan</p>
                   @else
                    <p class="btn btn-danger btn-sm">Tasdiqlanmagan</p>
                   @endif
                </td>              
                <td>{{ $modulMazmuni->is_private }}</td>   
                <td>{{ $modulMazmuni->created_at }}</td>
                <td>
                    {!! Form::open(['route' => ['modulMazmunis.destroy', $modulMazmuni->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('modulMazmunis.show', [$modulMazmuni->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('modulMazmunis.edit', [$modulMazmuni->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Qaroriz qatiymi?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>