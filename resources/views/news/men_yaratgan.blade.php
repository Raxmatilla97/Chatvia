<div class="table-responsive-sm">
    <table class="table table-striped" id="news-table">
        <thead>
            <tr>
                <th>Nomlanishi</th>   
                <th>Aktivligi</th>
                <th>Moderatsiya</th>
                <th>Yaratilgan sana</th>
                <th>Yaratgan</th>
                <th colspan="3">Amaliyot</th>
            </tr>
        </thead>
        <tbody>
        @foreach($news as $news3)
            @if($news3->user_id == Auth::user()->id)
            <tr>
                <td>{{ $news3->title }}</td>
                <td>@if($news3->is_active)
                     <p class="btn btn-success btn-sm">Aktiv</p>
                    @else
                     <p class="btn btn-danger btn-sm">No Aktiv</p>
                    @endif
                  
                </td>             
                <td>@if($news3->is_ready)
                    <p class="btn btn-success btn-sm">Tasdiqlangan</p>
                   @else
                    <p class="btn btn-danger btn-sm">Tasdiqlanmagan</p>
                   @endif
                 
               </td>
                <td>{{ $news3->created_at }}</td>
                <td><p class="btn btn-info btn-sm">{{ $news3->user->name }}</p></td>
                <td></td>
                <td>
                    {!! Form::open(['route' => ['news.destroy', $news3->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('news.show', [$news3->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('news.edit', [$news3->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Qaroringiz qatiymi?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endif
          
        @endforeach
        </tbody>
    </table>
</div>