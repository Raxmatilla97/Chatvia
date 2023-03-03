<div class="table-responsive-sm">
    <table class="table table-striped" id="modulMazmunis-table">
        <thead>
            <tr>
                <th>Mavzular</th>    
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
                <td>{{ $modulMazmuni->category }}</td>
                <td>{{ $modulMazmuni->is_active }}</td>
                <td>{{ $modulMazmuni->is_moderate }}</td>              
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