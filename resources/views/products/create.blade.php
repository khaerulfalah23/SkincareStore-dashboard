@extends("layout")

@section("content")

<h1>Tambah Product</h1>

<form enctype="multipart/form-data" method="post" action="{{ route('products.store') }}">
    @csrf
    <div class="grid">
        <div>
            <label>Nama</label>
            <input
                name="name"
                type="text"
                placeholder="Nama produk baru"
                value="{{ old('name') }}"
                autocomplete="off">

            <br>
            <br>

            <label>Image</label>
            <input name="picturePath" type="file">

            <br>
            <br>

            <label>Ingredients</label>
            <input
                type="text"
                name="ingredients"
                placeholder="contoh: Salicylid acid, Vitamin C"
                value="{{ old('ingredients') }}"
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
                value="{{ old('price') }}"
                autocomplete="off">

            <br>
            <br>

            <label>Rate</label>
            <input
                type="number"
                name="rate"
                value="{{ old('rate') }}"
                autocomplete="off">

            <br>
            <br>

            <label>Types</label>
            <input
                type="text"
                name="types"
                placeholder="contoh: sunscreen, serum, facial_wash"
                value="{{ old('types') }}"
                autocomplete="off">
            <span style="font-size: 0.8rem;">
                Dipisahkan dengan koma
            </span>
        </div>

    </div>

    <br>

    <label>Deskripsi</label>
    <textarea name="description" placeholder="Deskripsi produk"> {{ old('description') }}</textarea>

    <br>
    <br>

    <button>
        Simpan
    </button>
</form>

<br>
<br>
@endsection