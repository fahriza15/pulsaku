<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Dashboard</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto px-6">

            <p class="mb-6 text-gray-600">
                Halo, <span class="font-semibold">{{ auth()->user()->name }}</span>.
                Mau ngapain hari ini?
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <a href="{{ route('shop') }}" class="block bg-white p-6 rounded-lg shadow-sm hover:shadow-md">
                    <p class="font-semibold text-lg">Beli Pulsa</p>
                    <p class="text-sm text-gray-500">Pilih operator dan nominal, lalu bayar.</p>
                </a>

                <a href="{{ route('orders.index') }}" class="block bg-white p-6 rounded-lg shadow-sm hover:shadow-md">
                    <p class="font-semibold text-lg">Riwayat Pesanan</p>
                    <p class="text-sm text-gray-500">Lihat pesanan dan unduh invoice PDF.</p>
                </a>

                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('admin.products.index') }}" class="block bg-white p-6 rounded-lg shadow-sm hover:shadow-md border-l-4 border-gray-800">
                        <p class="font-semibold text-lg">Kelola Produk <span class="text-xs text-gray-500">(Admin)</span></p>
                        <p class="text-sm text-gray-500">Tambah, ubah, hapus operator dan nominal.</p>
                    </a>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>