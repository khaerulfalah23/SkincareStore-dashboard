@extends("auth.layout")

@section("content")

<h1 style="color: crimson; text-align: center;">
    Oops!
</h1>

<h2 style="text-align: center;">
    Hanya admin yang bisa mengakses halaman tersebut
</h2>

<a href="/logout">
    <button>
        Logout
    </button>
</a>

@endsection