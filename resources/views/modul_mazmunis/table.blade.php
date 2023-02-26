<div class="table-responsive-sm">
    <table class="table table-striped" id="modulMazmunis-table">
        <thead>
            <tr>
                <th>Title</th>
        <th>Slug</th>
        <th>Img</th>
        <th>Category</th>
        <th>Is Active</th>
        <th>Is Moderate</th>
        <th>Content</th>
        <th>Is Private</th>
        <th>File</th>
        <th>Url Content</th>
        <th>Created At</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($modulMazmunis as $modulMazmuni)
            <tr>
                <td>{{ $modulMazmuni->title }}</td>
            <td>{{ $modulMazmuni->slug }}</td>
            <td>{{ $modulMazmuni->img }}</td>
            <td>{{ $modulMazmuni->category }}</td>
            <td>{{ $modulMazmuni->is_active }}</td>
            <td>{{ $modulMazmuni->is_moderate }}</td>
            <td>{{ $modulMazmuni->content }}</td>
            <td>{{ $modulMazmuni->is_private }}</td>
            <td>{{ $modulMazmuni->file }}</td>
            <td>{{ $modulMazmuni->url_content }}</td>
            <td>{{ $modulMazmuni->created_at }}</td>
                <td>
                    {!! Form::open(['route' => ['modulMazmunis.destroy', $modulMazmuni->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('modulMazmunis.show', [$modulMazmuni->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('modulMazmunis.edit', [$modulMazmuni->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>