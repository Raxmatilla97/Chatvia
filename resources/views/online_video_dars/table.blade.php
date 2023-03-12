<div class="table-responsive-sm">
    <table class="table table-striped" id="onlineVideoDars-table">
        <thead>
            <tr>
                <th>Title</th>
        <th>Slug</th>
        <th>Img</th>
        <th>Content</th>
        <th>Url</th>
        <th>Is Active</th>
        <th>Created At</th>
        <th>Yutube Video Url</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($onlineVideoDars as $onlineVideoDars)
            <tr>
                <td>{{ $onlineVideoDars->title }}</td>
            <td>{{ $onlineVideoDars->slug }}</td>
            <td>{{ $onlineVideoDars->img }}</td>
            <td>{{ $onlineVideoDars->content }}</td>
            <td>{{ $onlineVideoDars->url }}</td>
            <td>{{ $onlineVideoDars->is_active }}</td>
            <td>{{ $onlineVideoDars->created_at }}</td>
            <td>{{ $onlineVideoDars->yutube_video_url }}</td>
                <td>
                    {!! Form::open(['route' => ['onlineVideoDars.destroy', $onlineVideoDars->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('onlineVideoDars.show', [$onlineVideoDars->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('onlineVideoDars.edit', [$onlineVideoDars->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>