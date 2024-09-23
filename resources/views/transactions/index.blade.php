@extends("layout")

@section("content")

<h1>Transactions</h1>

<div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>PRODUCT</th>
                <th>USER</th>
                <th>QUANTITY</th>
                <th>TOTAL</th>
                <th>STATUS</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $t)
            <tr>
                <td>{{ $t->id }}</td>
                <td style="color: deeppink; font-weight: 600">{{ $t->product->name }}</td>
                <td>{{ $t->user->name }}</td>
                <td>{{ $t->quantity }}</td>
                <td>Rp. {{ number_format($t->total) }}</td>
                <td>
                    <span class="{{ $t->status }}">
                        {{ $t->status }}
                    </span>
                </td>
                <td>
                    <div class="flex">
                        <a href="{{ route('transactions.show', $t->id) }}">
                            View
                        </a>
                        <form
                            method="post"
                            action="{{ route('transactions.destroy', $t->id) }}"
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

<p>Ditemukan <b>{{ count($transactions) }}</b> transaksi</p>
@endsection