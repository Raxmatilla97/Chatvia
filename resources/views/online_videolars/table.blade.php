<div class="table-responsive-sm">
    <table class="table table-striped" id="onlineVideolars-table">
        <thead>
            <tr>
                <th>Title</th>
        <th>Youtube</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($onlineVideolars as $onlineVideolar)
            <tr>
                <td>{{ $onlineVideolar->title }}</td>
            <td>{{ $onlineVideolar->youtube }}</td>
                <td>
                    {!! Form::open(['route' => ['onlineVideolars.destroy', $onlineVideolar->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('onlineVideolars.show', [$onlineVideolar->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('onlineVideolars.edit', [$onlineVideolar->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>