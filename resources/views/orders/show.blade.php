<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Pesanan {{ $order->kode }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto px-6 bg-white p-6 shadow-sm rounded-lg">

            @if (session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
            @endif

            <table class="w-full text-left">
                <tr><td class="py-1 text-gray-500">Operator</td><td>{{ $order->operator }}</td></tr>
                <tr><td class="py-1 text-gray-500">Nominal</td><td>Rp {{ number_format($order->nominal, 0, ',', '.') }}</td></tr>
                <tr><td class="py-1 text-gray-500">Nomor HP</td><td>{{ $order->nomor_hp }}</td></tr>
                <tr><td class="py-1 text-gray-500">Total Bayar</td><td class="font-semibold">Rp {{ number_format($order->total, 0, ',', '.') }}</td></tr>
                <tr>
                    <td class="py-1 text-gray-500">Status</td>
                    <td>
                        @if ($order->status === 'paid')
                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-sm">Paid</span>
                        @else
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded text-sm">Pending</span>
                        @endif
                    </td>
                </tr>
                @if ($order->status === 'paid')
                    <tr><td class="py-1 text-gray-500">Metode</td><td>{{ $order->metode_bayar }}</td></tr>
                    <tr><td class="py-1 text-gray-500">Dibayar</td><td>{{ $order->paid_at->format('d/m/Y H:i') }}</td></tr>
                @endif
            </table>

            @if ($order->status === 'pending')
                <form method="POST" action="{{ route('orders.pay', $order) }}" class="mt-6">
                    @csrf
                    <p class="font-medium mb-2">Pilih Metode Pembayaran</p>
                    @foreach (['QRIS', 'Transfer VA', 'E-Wallet'] as $m)
                        <label class="block mb-1">
                            <input type="radio" name="metode_bayar" value="{{ $m }}" class="mr-2"> {{ $m }}
                        </label>
                    @endforeach
                    @error('metode_bayar') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror

                    <button type="submit" class="mt-4 px-4 py-2 bg-gray-800 text-white rounded-md">
                        Simulasikan Bayar
                    </button>
                    <p class="mt-2 text-xs text-gray-500">Ini simulasi pembayaran, tidak ada uang sungguhan.</p>
                </form>
            @endif

            @if ($order->status === 'paid')
                <a href="{{ route('orders.invoice', $order) }}"
                   class="inline-block mt-6 px-4 py-2 bg-gray-800 text-white rounded-md">
                    Unduh Invoice PDF
                </a>
            @endif

            <div class="mt-6 flex gap-4 text-sm">
                <a href="{{ route('orders.index') }}" class="text-blue-600">Riwayat Pesanan</a>
                <a href="{{ route('shop') }}" class="text-blue-600">Beli Lagi</a>
            </div>
        </div>
    </div>
</x-app-layout>