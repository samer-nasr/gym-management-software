<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Member</title>
    @include('style')

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    @include('layouts.navigation')
    <h2 class="title">Edit Member</h2>

    <div class="center form-container">
        <form class="center" action="{{url('save_member',$member->id)}}" method="post">
            <h2 class="form-title">Enter Member Info</h2>
            @csrf
            <label for="">First Name</label>
            <input class="input-style" type="text" name="fname" value="{{$member->first_name}}" required>

            <label for="">Last Name</label>
            <input class="input-style" type="text" name="lname" value="{{$member->last_name}}" required>

            <label for="">Email</label>
            <input class="input-style" type="email" name="email" value="{{$member->email}}">

            <label for="">Phone</label>
            <input class="input-style" type="number" name="phone" value="{{$member->phone}}" required>

            <label for="">Address</label>
            <input class="input-style" type="text" name="address" value="{{$member->address}}" required>

            <input class="submit" type="submit" value="Save">
            <input form="delete-form" class="submit" style="background-color: red; margin-top: 0.7em" type="submit" value="Delete">
        </form>
    </div>

    <form class="hidden" action="{{url('delete_member',$member->id)}}" method="get" id="delete-form">
        @csrf
    </form>
</body>

</html>
