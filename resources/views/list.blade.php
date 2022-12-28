<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todo App </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>

<div class="container mt-2">

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Todo App View</h2>

            </div>
            <br>

            <div class="pull-right mb-2">

                <a class="btn btn-success" href="{{ route('todo.create') }}"> Create</a>

            </div>

        </div>

    </div>

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

    <table class="table table-bordered">

        <tr>

            <th>Title</th>

            <th>Description</th>

            <th>Label</th>

            <th>Status</th>

            <th>Date</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($todo as $todos)

            <tr>

                <td>{{ $todos->title }}</td>

                <td>{{ $todos->description }}</td>

                <td>{{ $todos->label }}</td>

                <td>{{ $todos->status }}</td>

                <td>{{ $todos->date }}</td>

                <td>

                    <form action="{{ route('todo.destroy',$todos->id) }}" method="Post">

                        <a class="btn btn-primary" href="{{ route('todo.show',$todos->id) }}">show</a>

                        <a class="btn btn-primary" href="{{ route('todo.edit',$todos->id) }}">Edit</a>

                        @csrf

                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>

                    </form>

                </td>

            </tr>

        @endforeach

    </table>
{!! $todo->links() !!}

</body>
</html>
