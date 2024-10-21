@extends('layouts.admin')

@section('content')
<h1 class="text-center mb-5">Order Makanan/Minuman</h1>
<div class="row">
    <div class="col-md-8">
        <div class="row">
            @foreach($menus as $menu)
                <div class="col-lg-3 col-md-4 col-6 mb-4">
                    <div class="card menu-card h-100">
                        <img src="{{ asset($menu->gambar) }}" class="card-img-top" alt="{{ $menu->nama }}" 
                             style="height: 150px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="font-weight-bold small">{{ $menu->nama }}</h5>
                            <p class="small">Rp. {{ number_format($menu->harga, 0, ',', '.') }}</p>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-sm btn-secondary" 
                                    onclick="updateQuantity('{{ $menu->id }}', '{{ $menu->nama }}', '{{ $menu->harga }}', -1)">-</button>
                                <input type="number" id="menu-{{ $menu->id }}" value="0" data-harga="{{ $menu->harga }}"
                                    data-nama="{{ $menu->nama }}" class="mx-2 text-center" style="width: 50px;" readonly>
                                <button class="btn btn-sm btn-secondary" 
                                    onclick="updateQuantity('{{ $menu->id }}', '{{ $menu->nama }}', '{{ $menu->harga }}', 1)">+</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="col-md-4">
        <h3>Detail Pesanan</h3>
        <form action="{{ route('order.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
                <input type="text" class="form-control" name="nama_pemesan" required>
            </div>

            <div id="order-summary" class="mb-3"></div>

            <div class="mb-3">
                <label for="uang_dibayar" class="form-label">Nominal Uang</label>
                <input type="number" class="form-control" name="uang_dibayar" id="uang_dibayar" required>
            </div>
            <div class="mb-3">
                <label for="kembalian" class="form-label">Kembalian</label>
                <input type="text" class="form-control" id="kembalian" readonly>
            </div>

            <input type="hidden" name="total_harga" id="total_harga">
            <button type="submit" class="btn btn-success mt-3 w-100">Pesan</button>
        </form>
    </div>
</div>

<!-- Modal Pesanan Berhasil -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Pesanan Berhasil</h5>
            </div>
            <div class="modal-body">Pesanan Anda telah berhasil diproses.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    let order = [];

    function updateQuantity(menuId, nama, harga, increment) {
        const quantityInput = document.getElementById(`menu-${menuId}`);
        let quantity = parseInt(quantityInput.value) + increment;
        if (quantity < 0) quantity = 0;
        quantityInput.value = quantity;

        const existingMenu = order.find(item => item.id === menuId);

        if (existingMenu) {
            existingMenu.jumlah = quantity;
        } else {
            order.push({ id: menuId, nama, harga: parseFloat(harga), jumlah: quantity });
        }

        updateOrderSummary();
    }

    function updateOrderSummary() {
        let summaryHTML = '';
        let totalHarga = 0;

        order.forEach(menu => {
            if (menu.jumlah > 0) {
                const subtotal = menu.harga * menu.jumlah;
                totalHarga += subtotal;
                summaryHTML += `<p>${menu.nama}: ${menu.jumlah} pcs - Rp. ${subtotal.toLocaleString()}</p>`;
            }
        });

        document.getElementById('order-summary').innerHTML = summaryHTML;
        document.getElementById('total_harga').value = totalHarga;
    }

    document.getElementById('uang_dibayar').addEventListener('input', function () {
        const totalHarga = parseFloat(document.getElementById('total_harga').value) || 0;
        const uangDibayar = parseFloat(this.value) || 0;
        const kembalian = uangDibayar - totalHarga;

        document.getElementById('kembalian').value = kembalian >= 0 ? kembalian.toLocaleString() : 0;
    });

    document.querySelector('form').addEventListener('submit', function (event) {
        event.preventDefault();
        const button = event.target.querySelector('button[type="submit"]');
        button.disabled = true;
        button.textContent = 'Processing...';

        setTimeout(() => {
            const modal = new bootstrap.Modal(document.getElementById('successModal'));
            modal.show();
            button.disabled = false;
            button.textContent = 'Pesan';
            event.target.reset();
            document.getElementById('order-summary').innerHTML = '';
            document.getElementById('total_harga').value = 0;
            document.getElementById('kembalian').value = '';
            order = [];
        }, 1500);
    });
</script>
@endsection