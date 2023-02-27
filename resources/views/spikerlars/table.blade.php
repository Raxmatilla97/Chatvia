<div class="table-responsive-sm">
    <table class="table table-striped" id="spikerlars-table">
        <thead>
            <tr>
                <th>Fish</th>
        <th>Ish Joyi</th>
        <th>About</th>
        <th>Is Active</th>
        <th>Created At</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($spikerlars as $spikerlar)
            <tr>
                <td>{{ $spikerlar->fish }}</td>
            <td>{{ $spikerlar->ish_joyi }}</td>
            <td>{{ $spikerlar->about }}</td>
            <td>{{ $spikerlar->is_active }}</td>
            <td>{{ $spikerlar->created_at }}</td>
                <td>
                    {!! Form::open(['route' => ['spikerlars.destroy', $spikerlar->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('spikerlars.show', [$spikerlar->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('spikerlars.edit', [$spikerlar->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>