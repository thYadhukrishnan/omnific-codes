<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit user</title>
</head>
<body>
    <div class="container">
        <form action="{{route('userEditSave')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{$userData->email}}" required>
            </div>
            <div class="form-group">
              <label for="password">Name</label>
              <input type="text" class="form-control" id="password" placeholder="Name" name="name" value="{{$userData->name}}" required>
            </div>
            <input type="hidden" name="id" value="{{$userData->id}}">
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
          </form>
    </div>
</body>
</html>