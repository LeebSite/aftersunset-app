@extends('layouts.admin')

@section('content')
    <h1>Order Makanan/Minuman</h1>
    <div class="row">
        <div class="col-md-8">
            <div class="menu">
                <div class="menu-item">
                    <img src="https://via.placeholder.com/100" alt="Item 1">
                    <p>Item 1</p>
                    <p>Rp. 7000</p>
                </div>
                <div class="menu-item">
                    <img src="https://via.placeholder.com/100" alt="Item 2">
                    <p>Item 2</p>
                    <p>Rp. 8000</p>
                </div>
                <!-- Add more menu items as needed -->
            </div>
        </div>

        <div class="col-md-4">
            <div class="order-form">
                <h3>Input Pesanan</h3>
                <form>
                    <div class="mb-3">
                        <label for="namaPemesan" class="form-label">Nama Pemesan</label>
                        <input type="text" class="form-control" id="namaPemesan">
                    </div>
                    <div class="mb-3">
                        <label for="menu" class="form-label">Menu</label>
                        <input type="text" class="form-control" id="menu">
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" value="1">
                    </div>
                    <div class="mb-3">
                        <label for="subtotal" class="form-label">Subtotal Harga</label>
                        <input type="text" class="form-control" id="subtotal" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nominal" class="form-label">Nominal Uang</label>
                        <input type="text" class="form-control" id="nominal">
                    </div>
                    <div class="mb-3">
                        <label for="kembalian" class="form-label">Kembalian</label>
                        <input type="text" class="form-control" id="kembalian" readonly>
                    </div>
                    <button type="submit" class="btn btn-success">Pesan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
