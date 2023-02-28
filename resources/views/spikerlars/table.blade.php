<div class="table-responsive-sm">
    <table class="table table-striped" id="spikerlars-table">
        <thead>
            <tr>
                <th>FISH</th>
        <th>Ish Joyi</th>        
        <th>Aktivligi</th>
        <th>Yaratilgan sana</th>
                <th colspan="3">Amaliyotlar</th>
            </tr>
        </thead>
        <tbody>
        @foreach($spikerlars as $spikerlar)
            <tr>
                <td>{{ $spikerlar->fish }}</td>
            <td>{{ $spikerlar->ish_joyi }}</td>          
            <td>@if($spikerlar->is_active)
                    <p class="btn btn-success btn-sm">Aktiv</p>
                @else
                    <p class="btn btn-danger btn-sm">No Aktiv</p>
                @endif
             
            </td>
            <td>{{ $spikerlar->created_at }}</td>
                <td>
                    {!! Form::open(['route' => ['spikerlars.destroy', $spikerlar->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('spikerlars.show', [$spikerlar->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('spikerlars.edit', [$spikerlar->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Qaroriz qatiymi?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>