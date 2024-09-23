@extends("auth.layout")

@section("content")

<form method="post" action="/register">
    @csrf
    <h2 style="text-align:center; color:steelblue">
        Buat Akun
    </h2>

    <label>Nama</label>
    <input
        type="text"
        name="name"
        placeholder="Nama pengguna"
        required
        autocomplete="off">

    <br>
    <br>

    <label>Email</label>
    <input
        type="email"
        name="email"
        placeholder="Alamat email"
        required
        autocomplete="off">

    <br>
    <br>

    <label>Password</label>
    <input type="password" name="password" required>

    <br>
    <br>

    <label>Ulangi Password</label>
    <input type="password_repeat" required>

    <br>
    <br>


    <button>
        DAFTAR
    </button>
</form>

<a href="/login">
    Login
</a>

@endsection