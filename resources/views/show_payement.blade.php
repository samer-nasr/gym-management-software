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
        <h2 class="home_title">Show Payements</h2>
        <table class="center" style="border: none;">
            <tr>
                <th>ID</th>
                <th>Member Name</th>
                <th>Bundle</th>
                <th>Amount</th>
            </tr>

            @foreach ($payements as $payement)
            <tr>
                <td>{{ $payement->id }}</td>
                <td>{{ $payement->member->first_name}} {{ $payement->member->last_name}}</td>
                <td>{{ $payement->bundle->name }}</td>
                <td>{{ $payement->amount }}</td>
            </tr>
            @endforeach
        </table>
        <div>
            {{ $payements->links() }}
        </div>
    </div>

</body>
</html>
