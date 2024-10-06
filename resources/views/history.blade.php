@extends('layouts.admin')

@section('content')
    <h1>History Pemesanan</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Pemesan</th>
                <th>Pesanan</th>
                <th>Nominal Uang</th>
                <th>Kembalian</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John Doe</td>
                <td>Item 1</td>
                <td>Rp. 50.000</td>
                <td>Rp. 43.000</td>
                <td>Rp. 7.000</td>
                <td><button class="btn btn-danger">Hapus</button></td>
            </tr>
            <!-- Tambahkan baris lain untuk history lainnya -->
        </tbody>
    </table>
@endsection
