<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    // Halaman katalog + form beli
    public function shop()
    {
        $products = Product::orderBy('operator')->orderBy('nominal')->get();
        return view('orders.shop', compact('products'));
    }

    // Simpan pesanan baru (status pending)
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'nomor_hp'   => ['required', 'regex:/^08[0-9]{8,11}$/'],
        ], [
            'product_id.required' => 'Pilih nominal pulsa dulu.',
            'nomor_hp.regex'      => 'Nomor HP harus diawali 08 dan 10-13 digit.',
        ]);

        $product = Product::findOrFail($data['product_id']);

        $order = Order::create([
            'kode'       => 'INV-' . now()->format('Ymd') . '-' . strtoupper(Str::random(5)),
            'user_id'    => auth()->id(),
            'product_id' => $product->id,
            'operator'   => $product->operator,
            'nominal'    => $product->nominal,
            'nomor_hp'   => $data['nomor_hp'],
            'total'      => $product->harga_jual,
            'laba'       => $product->harga_jual - $product->harga_modal,
            'status'     => 'pending',
        ]);

        return redirect()->route('orders.show', $order);
    }

    // Riwayat pesanan milik user yang login
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->latest()->get();
        return view('orders.index', compact('orders'));
    }

    // Detail pesanan + halaman bayar
    public function show(Order $order)
    {
        $this->pastikanMilikSendiri($order);
        return view('orders.show', compact('order'));
    }

    // Simulasi pembayaran: ubah status pending jadi paid
    public function pay(Request $request, Order $order)
    {
        $this->pastikanMilikSendiri($order);

        if ($order->status === 'paid') {
            return redirect()->route('orders.show', $order);
        }

        $data = $request->validate([
            'metode_bayar' => 'required|in:QRIS,Transfer VA,E-Wallet',
        ], [
            'metode_bayar.required' => 'Pilih metode pembayaran dulu.',
        ]);

        $order->update([
            'metode_bayar' => $data['metode_bayar'],
            'status'       => 'paid',
            'paid_at'      => now(),
        ]);

        return redirect()->route('orders.show', $order)
            ->with('success', 'Pembayaran berhasil (simulasi).');
    }

    private function pastikanMilikSendiri(Order $order): void
    {
        abort_unless($order->user_id === auth()->id(), 403);
    }
}