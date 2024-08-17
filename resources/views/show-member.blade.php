<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Members</title>
    @include('style')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    @include('layouts.navigation')
    <h2 class="title">Show Members</h2>

    <div class="center ">

        <form action="{{url('search_for_member')}}" method="POST" class="search-form">
            @csrf
            <label for="">Search:</label>
            <input type="Search" name="search">
            <input type="submit" value="Search" class="search-button">
        </form>

        <table class="center">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Created_at</th>
                <th>Add Membership</th>
            </tr>

            @foreach ($members as $member)
            <tr>
                <td>{{ $member->id }}</td>
                <td>{{ $member->first_name}} {{ $member->last_name}}</td>
                <td>{{ $member->phone }}</td>
                <td>{{ $member->address }}</td>
                <td>{{ $member->created_at }}</td>
                <td>
                    <form class="center" action="{{url('add_membership_to_member',$member->id)}}" method="POST">
                        @csrf
                        <label for="">Bundle</label>
                        <select class="input-style" name="bundle" id="">
                            <option value="">Select a Bundle</option>
                            @foreach ($bundles as $bundle)
                            <option value="{{$bundle->id}}">{{$bundle->name}}</option>
                            @endforeach
                        </select>
                        <input type="submit" class="submit" value="Add">
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>

</html>