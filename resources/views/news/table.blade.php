<div class="table-responsive-sm">
    <table class="table table-striped" id="news-table">
        <thead>
            <tr>
                <th>Title</th>
        <th>Slug</th>
        <th>Img</th>
        <th>Content</th>
        <th>Is Active</th>
        <th>Is Ready</th>
        <th>Created At</th>
        <th>User Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($news as $news)
            <tr>
                <td>{{ $news->title }}</td>
            <td>{{ $news->slug }}</td>
            <td>{{ $news->img }}</td>
            <td>{{ $news->content }}</td>
            <td>{{ $news->is_active }}</td>
            <td>{{ $news->is_ready }}</td>
            <td>{{ $news->created_at }}</td>
            <td>{{ $news->user_id }}</td>
                <td>
                    {!! Form::open(['route' => ['news.destroy', $news->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('news.show', [$news->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('news.edit', [$news->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>