<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Show Todo</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >

</head>

<body>

<div class="container mt-2">

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Show Todo Event</h2>

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

        </tr>

        <tr>

            <td>{{ $todo->title }}</td>

            <td>{{ $todo->description }}</td>

            <td>{{ $todo->label }}</td>

            <td>{{ $todo->status }}</td>

            <td>{{ $todo->date }}</td>

        </tr>

    </table>


<div class="row">
    <div class="col-md-12">

            <a class="btn btn-info btn-block" href="{{ route('todo.index') }}"> Back</a>

        </div>
    </div>
</div>
</body>
</html>
