<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validasi Input
        $request->validate([
            'nama_pemesan' => 'required',
            'uang_dibayar' => 'required|numeric',
            'total_harga' => 'required|numeric',
            'order' => 'required|array',
        ]);

        // Simpan Order
        $order = Order::create([
            'nama_pemesan' => $request->nama_pemesan,
            'total_harga' => $request->total_harga,
            'uang_dibayar' => $request->uang_dibayar,
            'kembalian' => $request->uang_dibayar - $request->total_harga,
        ]);

        // Simpan Detail Order
        foreach ($request->order as $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'nama_menu' => $item['nama'],
                'harga' => $item['harga'],
                'jumlah' => $item['jumlah'],
                'subtotal' => $item['harga'] * $item['jumlah'],
            ]);
        }

        return redirect()->back()->with('success', 'Pesanan berhasil disimpan!');
    }
}
