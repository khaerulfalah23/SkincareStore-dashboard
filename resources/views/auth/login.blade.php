@extends("auth.layout")

@section("content")

<form method="post" action="/login">
    @csrf
    <h2 style="text-align:center; color:steelblue">
        Panel Admin 💻
    </h2>

    <hr style="opacity: 0.3;">
    <p>Anda memasuki dashboard aplikasi, login dengan akun admin untuk melanjutkan</p>

    <label>Email</label>
    <input
        type="email"
        name="email"
        autocomplete="off"
        value="admin@admin.com"
        required>

    <br>
    <br>

    <label>Password</label>
    <input
        type="password"
        name="password"
        required
        value="password">

    <br>
    <br>

    <button> LOGIN </button>
</form>

<a href="/register">
    Daftar akun baru
</a>

@endsection