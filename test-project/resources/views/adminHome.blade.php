<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Admin Home</title>
</head>
<body>
    <div class="container">
        <div class="row p-5" style="justify-content:end; display: flex;">
            <a class="btn btn-primary" href="{{route('logout')}}" style="width: auto;">Log out</a>
        </div>
        <div class="row p-5">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    <tbody>
                        @if(!$userData->isEmpty())
                            @foreach ($userData as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('editUser',['id'=> $user->id]) }}">Edit</a>
                                        <a class="btn btn-danger" href="{{route('deleteUser',['id'=>$user->id])}}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        <tr>
                            <td colspan="3" style="text-align: center;">
                                No Data
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
</body>
</html>