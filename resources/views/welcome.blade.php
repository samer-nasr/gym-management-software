<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('style')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    @include('layouts.navigation')
    <h2 class="title">Home Page</h2>

    <div class="items-container">
        <div class="item">
            <h2 class="item-title">Numbers of Members :</h2>
            <h3 class="item-value">{{ $members_count }}</h3>
        </div>

        <div class="item">
            <h2 class="item-title">Numbers of Memberships :</h2>
            <h3 class="item-value">{{ $memberships_count }}</h3>
        </div>

        <div class="item">
            <h2 class="item-title">Numbers of Bundles :</h2>
            <h3 class="item-value">{{ $bundles_count }}</h3>
        </div>
    </div>

    
</body>

</html>
