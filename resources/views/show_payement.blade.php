<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Payement</title>

    @include('style')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.navigation')

    <div class="center">
        <h2 class="home_title">Payements</h2>

        <form action="{{url('search_for_payement')}}" method="GET" class="mt-2 search-form">
            @csrf
            <label for="search">Search:</label>
            <input id="search" type="Search" name="search">
            <input type="submit" value="Search" class="search-button">
        </form>

        <table class="center" style="border: none;">
            <tr>
                <th>ID</th>
                <th>Member</th>
                <th>Bundle</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>

            @foreach ($payements as $payement)
            <tr>
                <td>{{ $payement->id }}</td>
                <td>{{ $payement->member->first_name}} {{ $payement->member->last_name}}</td>
                <td>{{ $payement->bundle->name }}</td>
                <td>{{ $payement->amount }}</td>
                <td>{{ $payement->created_at}}</td>
            </tr>
            @endforeach
        </table>
        <div>
            {{ $payements->links() }}
        </div>
    </div>

</body>
</html>
