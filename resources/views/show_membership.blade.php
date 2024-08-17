<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Membership</title>
    @include('style')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @include('layouts.navigation')
    <h2 class="title">Show membership</h2>

    <div class="center ">
        <table class="center">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Bundle</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>

            @foreach ($memberships as $membership)
            <tr>
                <td>{{ $membership->id }}</td>
                <td>{{ $membership->member->first_name}} {{ $membership->member->last_name}}</td>
                <td>{{ $membership->bundle->name }}</td>
                <td>{{ $membership->start_date }}</td>
                <td>{{ $membership->end_date }}</td>
            </tr>
            @endforeach
        </table>
    </div>

</body>
</html>
