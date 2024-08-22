<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    @include('style')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('layouts.navigation')

    <div class="center form-container">
        <h2 class="title">Edit Membership</h2>
        <form class="center" action="{{url('save_membership',$membership->id)}}" method="post">
            <h2 class="form-title">Member : {{$membership->member->first_name .' '. $membership->member->last_name}}
            </h2>
            @csrf
            <label for="name">Start Date</label>
            <input id="name" class="input-style" type="date" name="start_date" value="{{$membership->start_date}}">

            <label for="price">End Date</label>
            <input id="price" class="input-style" type="date" name="end_date" value="{{$membership->end_date}}">

            <input class="submit" type="submit" value="SAVE">

        </form>

    </div>

</body>

</html>