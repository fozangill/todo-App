<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Update Todo Event</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >

</head>

<body>

<div class="container mt-2">

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left mb-2">

                <h2>Update Todo Event</h2>

            </div>

        </div>

    </div>
    <br>
    @if(session('status'))

        <div class="alert alert-success mb-1 mt-1">

            {{ session('status') }}

        </div>

    @endif


    <form action="{{ route('todo.update',$todo->id) }}" method="POST" enctype="multipart/form-data">

        @csrf

        @method('PUT')

        <div class="row">

            <div class="col-xs-6 col-sm-6 col-md-6">

                <div class="form-group">

                    <strong>Title:</strong>

                    <input type="text" name="title" class="form-control" placeholder="Title" value="<?php echo $todo->title; ?>">

                    @error('title')

                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>

                    @enderror

                </div>

            </div>
        </div>

        <div class="row">

            <div class="col-xs-6 col-sm-6 col-md-6">

                <div class="form-group">

                    <strong>Description:</strong>

                    <textarea name="description" class="form-control" placeholder="Hello ..."><?php echo $todo->description; ?></textarea>

                    @error('description')

                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>

                    @enderror

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-xs-6 col-sm-6 col-md-6">

                <div class="form-group">

                    <strong>Label:</strong>

                    <select id="label" name="label" class="form-control">
                        <option value="Homework" <?php echo ($todo->label == 'Homework' ? 'selected':''); ?>>Homework</option>
                        <option value="Job" <?php echo ($todo->label == 'Job' ? 'selected':''); ?>>Job</option>
                        <option value="Private" <?php echo ($todo->label == 'Private' ? 'selected':''); ?>>Private</option>
                        <option value="ShoppingList" <?php echo ($todo->label == 'ShoppingList' ? 'selected':''); ?>>ShoppingList</option>
                    </select>

                    @error('label')

                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>

                    @enderror

                </div>

            </div>
        </div>

        <div class="row">

            <div class="col-xs-6 col-sm-6 col-md-6">

                <div class="form-group">

                    <strong>Status:</strong>

                    <select id="status" name="status" class="form-control">
                        <option value="Planned" <?php echo ($todo->status == 'Planned' ? 'selected':''); ?>>Planned</option>
                        <option value="In Progress" <?php echo ($todo->status == 'In Progress' ? 'selected':''); ?>>In Progress</option>
                        <option value="Done" <?php echo ($todo->status == 'Done' ? 'selected':''); ?>>Done</option>
                    </select>

                    @error('status')

                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>

                    @enderror

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-xs-6 col-sm-6 col-md-6">

                <div class="form-group">

                    <strong>Date:</strong>

                    <input type="datetime-local" name="date" class="form-control" placeholder="Enter Date" value="<?php echo $todo->date; ?>">

                    @error('date')

                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>

                    @enderror

                </div>

            </div>
        </div>

        <div class="row">

            <div class="col-md-6">


                <a class="btn btn-primary btn-block" href="{{ route('todo.index') }}"> Back</a>

            </div>
        </div>
    <br>
        <div class="row">

            <div class="col-md-6">

                <button type="submit" class="btn btn-success btn-block">Update</button>

            </div>

        </div>

    </form>
</div>

</body>

</html>
