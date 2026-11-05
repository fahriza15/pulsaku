<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Riwayat Pesanan</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto px-6">
            <a href="{{ route('shop') }}" class="inline-block mb-4 px-4 py-2 bg-aeon hover:bg-aeon-dark text-white rounded-md">
                + Beli Pulsa
            </a>

            <div class="bg-white shadow-sm rounded-lg overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-aeon-light text-aeon-dark">
                        <tr>
                            <th class="p-3">Kode</th>
                            <th class="p-3">Operator</th>
                            <th class="p-3">Nominal</th>
                            <th class="p-3">Nomor HP</th>
                            <th class="p-3">Total</th>
                            <th class="p-3">Status</th>
                            <th class="p-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $o)
                            <tr class="border-t">
                                <td class="p-3">{{ $o->kode }}</td>
                                <td class="p-3">{{ $o->operator }}</td>
                                <td class="p-3">Rp {{ number_format($o->nominal, 0, ',', '.') }}</td>
                                <td class="p-3">{{ $o->nomor_hp }}</td>
                                <td class="p-3">Rp {{ number_format($o->total, 0, ',', '.') }}</td>
                                <td class="p-3">{{ ucfirst($o->status) }}</td>
                                <td class="p-3"><a href="{{ route('orders.show', $o) }}" class="text-aeon">Detail</a></td>
                            </tr>
                        @empty
                            <tr><td colspan="7" class="p-6 text-center text-gray-500">Belum ada pesanan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>