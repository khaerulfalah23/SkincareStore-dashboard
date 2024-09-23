<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('app.css') }}">
    <title>Skincare</title>
</head>

<?php

use Illuminate\Support\Facades\Route;

function linkAktif($awalan)
{
    return str_starts_with(Route::currentRouteName(), $awalan)
        ? "active"
        : "";
}

?>

<body>
    <div class="wrap">
        <nav>
            <a class="{{ linkAktif('dashboard') }}" href="/">
                Dashboard
            </a>

            <a class="{{ linkAktif('products') }}" href="{{ route('products.index') }}">
                Products
            </a>

            <a class="{{ linkAktif('transactions') }}" href="{{ route('transactions.index') }}">
                Transactions
            </a>

            <a class="{{ linkAktif('users') }}" href="{{ route('users.index') }}">
                Users
            </a>

            <a href="{{ route('users.profile') }}">
                @if(Auth::user()->profile_photo_path)
                <img
                    src="{{ asset('/storage/'.Auth::user()->profile_photo_path) }}"
                    width="35"
                    height="35"
                    style="border-radius: 50%;" />
                @else
                <img
                    src="https://ui-avatars.com/api/?bold=true&background=random&name={{Auth::user()->name}}"
                    width="35"
                    height="35"
                    style="border-radius: 50%;" />
                @endif
            </a>
        </nav>

        <br>
        <br>
        <br>
        <br>


        @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @session('success')
        <div class="success">
            {{ $value }}
        </div>
        @endsession

        <main>
            @yield("content")
        </main>
    </div>

    <br>
    <br>
</body>

</html>