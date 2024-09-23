@extends("layout")

@section("content")

<h1>User</h1>

<a href="{{ route('users.create') }}">
    <button style="
        background-color: white; 
        border: 2px dashed deeppink; 
        color: deeppink;
    ">
        Tambah User
    </button>
</a>

<br>
<br>

<div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th>GAMBAR</th>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>ROLES</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $u)
            <tr>
                <td>
                    @if($u->profile_photo_path)
                    <img
                        src="{{ asset('/storage/'.$u->profile_photo_path) }}"
                        width="50"
                        height="50"
                        style="border-radius: 50%;" />
                    @else
                    <img
                        src="https://ui-avatars.com/api/?bold=true&background=random&name={{$u->name}}"
                        width="50"
                        height="50"
                        style="border-radius: 50%;" />
                    @endif
                </td>
                <td>{{ $u->id }}</td>
                <td style="color: deeppink; font-weight: 600">{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>
                    <span class="roles"> {{ $u->roles }} </span>
                </td>
                <td>
                    <div class="flex">
                        <a href="{{ route('users.edit', $u->id) }}">
                            Edit
                        </a>

                        <form
                            method="post"
                            action="{{ route('users.destroy', $u->id) }}"
                            onsubmit="return confirm('konfirmasi hapus?')">
                            @method('DELETE')
                            @csrf
                            <button style="background-color: crimson;">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

<p>Ditemukan <b>{{ count($users) }}</b> user</p>
@endsection