<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Beli Pulsa</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto px-6 bg-white p-6 shadow-sm rounded-lg">
            <form method="POST" action="{{ route('orders.store') }}">
                @csrf

                <label class="block text-sm font-medium">Nomor HP</label>
                <input type="text" name="nomor_hp" value="{{ old('nomor_hp') }}"
                       placeholder="08xxxxxxxxxx"
                       class="mt-1 w-full border-gray-300 rounded-md shadow-sm">
                @error('nomor_hp') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror

                <p class="mt-6 font-medium">Pilih Pulsa</p>
                @error('product_id') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror

                @forelse ($products->groupBy('operator') as $operator => $items)
                    <div class="mt-4">
                        <p class="font-semibold">{{ $operator }}</p>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 mt-2">
                            @foreach ($items as $p)
                                <label class="border rounded-md p-3 cursor-pointer">
                                    <input type="radio" name="product_id" value="{{ $p->id }}"
                                           class="mr-2" @checked(old('product_id') == $p->id)>
                                    Rp {{ number_format($p->nominal, 0, ',', '.') }}
                                    <div class="text-sm text-gray-500">
                                        Bayar Rp {{ number_format($p->harga_jual, 0, ',', '.') }}
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <p class="mt-4 text-gray-500">Belum ada produk. Minta admin tambah dulu.</p>
                @endforelse

                <button type="submit" class="mt-6 px-4 py-2 bg-gray-800 text-white rounded-md">
                    Lanjut ke Pembayaran
                </button>
            </form>
        </div>
    </div>
</x-app-layout>