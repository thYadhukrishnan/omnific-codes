<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>User Home</title>
</head>
<body>
    <div class="container">
        <div class="row p-5" style="justify-content:end; display: flex;">
            <a class="btn btn-primary" href="{{route('logout')}}" style="width: auto;">Log out</a>
        </div>
        <form action="{{route('selfEdit')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{$user->email}}" required>
            </div>
            <div class="form-group">
              <label for="password">Name</label>
              <input type="text" class="form-control" id="password" placeholder="Name" name="name" value="{{$user->name}}" required>
            </div>
            <input type="hidden" name="id" value="{{$user->id}}">
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
          </form>
    </div>
</body>
</html>