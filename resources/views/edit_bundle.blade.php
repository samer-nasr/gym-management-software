<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Bundle</title>
    @include('style')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('layouts.navigation')


    <div class="column-container">
        <div class="center form-container">
            <h2 class="title">Edit Bundle</h2>
            <form class="center" action="{{url('save_bundle',$bundle->id)}}" method="post">
                <h2 class="form-title">Enter Bundle Info</h2>
                @csrf
                <label for="name">Name</label>
                <input id="name" class="input-style" type="text" name="name" value="{{$bundle->name}}">

                <label for="price">Price</label>
                <input id="price" class="input-style" type="text" name="price" value="{{$bundle->price}}">

                <input class="submit" type="submit" value="SAVE">

            </form>
        </div>

        <div class="center form-container">
            <h2 class="title">Show Bundles</h2>
            <table class="center">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Modifie</th>
                </tr>

                @foreach ($bundles as $bundle)
                <tr>
                    <td>{{ $bundle->id }}</td>
                    <td>{{ $bundle->name}} </td>
                    <td>{{ $bundle->price }}</td>
                    <td>
                        <div>
                            <a class="delete-button" href="{{url('delete_bundle',$bundle->id)}}">Delete</a>
                            <a class="edit-button" href="{{url('edit_bundle' , $bundle->id)}}">Edit</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>


</body>

</html>
