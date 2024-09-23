@extends("layout")

@section("content")

<h1>Edit Product</h1>

<form enctype="multipart/form-data" method="post" action="{{ route('products.update', $product->id) }}">
    @csrf
    @method('PUT')
    <div class="grid">
        <div>
            <label>Nama</label>
            <input
                name="name"
                type="text"
                placeholder="Edit nama produk"
                value="{{ $product->name }}"
                autocomplete="off">

            <br>
            <br>

            <label>Image</label>
            <input
                name="picturePath"
                type="file">

            <br>
            <br>

            <label>Ingredients</label>
            <input
                type="text"
                name="ingredients"
                placeholder="contoh: Salicylid acid, Vitamin C"
                value="{{ $product->ingredients }}"
                autocomplete="off">
            <span style="font-size: 0.8rem;">
                Dipisahkan dengan koma
            </span>
        </div>

        <div>
            <label>Price</label>
            <input
                type="number"
                name="price"
                placeholder="Harga produk"
                value="{{ $product->price }}"
                autocomplete="off">

            <br>
            <br>

            <label>Rate</label>
            <input
                type="number"
                name="rate"
                value="{{ $product->rate }}"
                autocomplete="off">

            <br>
            <br>

            <label>Types</label>
            <input
                type="text"
                name="types"
                placeholder="contoh: sunscreen, serum, facial_wash"
                value="{{ $product->types }}"
                autocomplete="off">
            <span style="font-size: 0.8rem;">
                Dipisahkan dengan koma
            </span>
        </div>

    </div>

    <br>

    <label>Deskripsi</label>
    <textarea name="description" placeholder="Deskripsi produk"> {{ $product->description }}</textarea>

    <br>
    <br>

    <button> Simpan </button>
</form>

<br>
<br>
@endsection