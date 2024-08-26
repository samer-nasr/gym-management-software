<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Bundle</title>
    @include('style')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('layouts.navigation')


    <div class="column-container">
        <div class="center form-container bundle_form" >
            <h2 class="home_title">Add Bundle</h2>
            <form class="center bundle_form"  action="{{url('add_new_bundle')}}" method="post">
                <h2 class="form-title">Enter Bundle Info</h2>
                @csrf
                <label for="name">Name</label>
                <input id="name" class="input-style" type="text" name="name">

                <label for="price">Price</label>
                <input id="price" class="input-style" type="text" name="price">

                <input class="submit" type="submit" value="ADD">

            </form>
        </div>

        <div class="center form-container">
            <h2 class="home_title">Bundles</h2>
            <table class="center" style="border: none;">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Modify</th>
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
