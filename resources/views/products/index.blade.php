@extends("layout")

@section("content")

<h1>Product</h1>

<a href="{{ route('products.create') }}">
    <button style="
        background-color: white; 
        border: 2px dashed deeppink; 
        color: deeppink;
    ">
        Tambah Produk
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
                <th>PRICE</th>
                <th>RATE</th>
                <th>TYPES</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
            <tr>
                <td>
                    @if($p->picturePath)
                    <img
                        src="{{ asset('/storage/'.$p->picturePath) }}"
                        width="65"
                        height="65"
                        style="border-radius: 10px;" />
                    @else
                    <img
                        src="https://placehold.co/65x65"
                        width="65"
                        height="65"
                        style="border-radius: 10px;" />
                    @endif
                </td>
                <td>{{ $p->id }}</td>
                <td style="color: deeppink; font-weight: 600">{{ $p->name }}</td>
                <td>Rp. {{ number_format($p->price) }}</td>
                <td>{{ $p->rate }}</td>
                <td>
                    <div class="flex">
                        @foreach(explode(",", $p->types) as $type)
                        <span class="type">
                            {{ $type }}
                        </span>
                        @endforeach
                    </div>
                </td>
                <td>
                    <div class="flex">
                        <a href="{{ route('products.edit', $p->id) }}">
                            Edit
                        </a>

                        <form
                            method="post"
                            action="{{ route('products.destroy', $p->id) }}"
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

<p>Ditemukan <b>{{ count($products) }}</b> produk</p>
@endsection