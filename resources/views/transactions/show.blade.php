@extends("layout")

@section("content")

<h1>Transactions No. {{ $transaction->id }}</h1>

<div class="transaction">
    <article class="product">

        @if($transaction->product->picturePath)
        <img
            src="{{ asset('/storage/'.$transaction->product->picturePath) }}" />
        @else
        <img src="https://placehold.co/65x65" />
        @endif

        <h2 style="color: deeppink;">{{ $transaction->product->name }}</h2>

        <div class="detail">
            <p>Quantity</p>
            <p>{{ $transaction->quantity }}</p>
        </div>

        <div class="detail">
            <p>Total</p>
            <p style="font-size: 2rem;">
                Rp. {{ number_format($transaction->total) }}
            </p>
        </div>
    </article>
    <article class="pembeli">
        @if($transaction->user->profile_photo_path)
        <img
            src="{{ asset('/storage/'.$transaction->user->profile_photo_path) }}" />
        @else
        <img src="https://ui-avatars.com/api/?bold=true&background=random&name={{$transaction->user->name}}" />
        @endif

        <div class="detail">
            <p>User name</p>
            <p>{{ $transaction->user->name }}</p>
        </div>

        <div class="detail">
            <p>Email</p>
            <p>{{ $transaction->user->email }}</p>
        </div>

        <div class="detail">
            <p>City</p>
            <p>{{ $transaction->user->city ?? '-'}}</p>
        </div>


        <div class="detail">
            <p>Address</p>
            <p>{{ $transaction->user->address ?? '-' }}</p>
        </div>


        <div class="detail">
            <p>Phone number</p>
            <p>{{ $transaction->user->phoneNumber?? '-' }}</p>
        </div>

        <div class="detail">
            <p>Payment URL</p>
            <p style="color: steelblue;">{{ $transaction->payment_url }}</p>
        </div>
    </article>
    <article class="status">
        <h2>Status</h2>

        <p class="{{ $transaction->status }}">
            {{ $transaction->status }}
        </p>

        <form method="post" action="{{ route('transactions.update', $transaction->id) }}">
            @csrf
            @method('PUT')

            <select name="status">
                <option value="ON_DELIVERY">On Delivery</option>
                <option value="DELIVERED">Delivered</option>
                <option value="CANCELLED">Cancelled</option>
            </select>

            <br>
            <br>
            <button style="width: 100%;">Ubah Status</button>
        </form>
    </article>
</div>

@endsection