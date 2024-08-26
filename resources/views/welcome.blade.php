<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @include('style')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    @include('layouts.navigation')
    <h2 class="home_title">Home Page</h2>

    <div class="container">

        <div class="items-container">
            <div class="item">
                <a href="{{url('show_member')}}">
                    <h2 class="item-title">Numbers of Members :</h2>
                    <h3 class="item-value" style="text-align: center;">{{ $members_count }}</h3>
                </a>
            </div>

            <div class="item">
                <a href="{{url('show_membership')}}">
                    <h2 class="item-title">Numbers of Memberships :</h2>
                    <h3 class="item-value" style="text-align: center;">{{ $memberships_count }}</h3>
                </a>
            </div>

        </div>

        <div class="items-container">

            <div class="item">
                <a href="{{'add_bundle'}}">
                    <h2 class="item-title">Numbers of Bundles :</h2>
                    <h3 class="item-value" style="text-align: center;">{{ $bundles_count }}</h3>
                </a>
            </div>

            <div class="item">
                <a href="{{url('expired_memberships')}}">
                    <h2 class="item-title">Memberships Expired :</h2>
                    <h3 class="item-value" style="text-align: center;">{{ $expired_memberships_count }}</h3>
                </a>
            </div>

        </div>

    </div>


</body>

</html>
