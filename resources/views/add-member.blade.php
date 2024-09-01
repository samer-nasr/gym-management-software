<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Member</title>
    @include('style')

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    @include('layouts.navigation')
    <h2 class="home_title">Add New Member</h2>

    <div class="center form-container">
        <form class="center" action="{{url('add_new_member')}}" method="post">
            <h2 class="form-title">Enter Member Info</h2>
            @csrf
            <label for="fname">First Name</label>
            <input id="fname" class="input-style" type="text" name="fname" required>

            <label for="lname">Last Name</label>
            <input id="lname" class="input-style" type="text" name="lname" required>

            <label for="email">Email</label>
            <input id="email" class="input-style" type="email" name="email">

            <label for="phone">Phone</label>
            <input id="phone" class="input-style" type="number" name="phone">

            <label for="address">Address</label>
            <input id="address" class="input-style" type="text" name="address" required>

            <input class="submit" type="submit" value="ADD">

        </form>
    </div>
</body>

</html>
