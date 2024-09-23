@extends("layout")

@section("content")

<h1>Edit User #{{ $user->id }}</h1>

<form enctype="multipart/form-data" method="post" action="{{ route('users.update', $user->id) }}">
    @csrf
    @method('PUT')
    <div class="grid">
        <div>
            <label>Nama</label>
            <input
                name="name"
                type="text"
                placeholder="Nama akun baru"
                value="{{ $user->name }}"
                autocomplete="off">

            <br>
            <br>

            <label>Image (opsional)</label>
            <input name="profile_photo_path" type="file">

            <br>
            <br>

            <label>Email</label>
            <input
                name="email"
                type="email"
                placeholder="Alamat email"
                value="{{ $user->email }}"
                autocomplete="off">

            <br>
            <br>

            <label>Password</label>
            <input
                type="password"
                name="password"
                autocomplete="off">

            <br>
            <br>

            <label>Address</label>
            <input
                name="address"
                type="text"
                placeholder="Alamat user"
                value="{{ $user->address }}"
                autocomplete="off">

            <br>
        </div>

        <div>
            <label>Roles</label>
            <select name="roles">
                <option value="ADMIN">Admin</option>
                <option value="USER">User</option>
            </select>

            <br>
            <br>

            <label>House Number</label>
            <input
                name="houseNumber"
                type="text"
                placeholder="Nomor rumah user"
                value="{{ $user->houseNumber }}"
                autocomplete="off">

            <br>
            <br>

            <label>Phone Number</label>
            <input
                name="phoneNumber"
                type="text"
                placeholder="Nomor telepon user"
                value="{{ $user->phoneNumber }}"
                autocomplete="off">

            <br>
            <br>

            <label>City</label>
            <input
                type="text"
                name="city"
                value="{{ $user->city }}"
                autocomplete="off">
        </div>

    </div>

    <br>
    <br>

    <button> Simpan </button>
</form>

<br>
<br>
@endsection