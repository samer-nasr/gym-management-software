<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Membership</title>
    @include('style')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('layouts.navigation')

    <h2 class="title">Add membership</h2>
    <div class="center">
        <form class="center" action="{{url('add_membership_to_member',0)}}" method="POST">
            @csrf
            <label for="">Member</label>
            <select class="input-style" name="member" id="">
                <option value="">Select a Member</option>
                @foreach ($members as $member)
                <option value="{{$member->id}}">{{$member->first_name}}</option>
                @endforeach
            </select>

            <label for="">Bundle</label>
            <select class="input-style" name="bundle" id="">
                <option value="">Select a Bundle</option>
                @foreach ($bundles as $bundle)
                <option value="{{$bundle->id}}">{{$bundle->name}}</option>
                @endforeach
            </select>

            <input type="submit" class="submit" value="Add">

        </form>
    </div>

</body>

</html>
