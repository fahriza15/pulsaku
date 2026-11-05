<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Kelola Produk Pulsa</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto px-6">

            @if (session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('admin.products.create') }}"
               class="inline-block mb-4 px-4 py-2 bg-aeon hover:bg-aeon-dark text-white rounded-md">
                + Tambah Produk
            </a>

            <div class="bg-white shadow-sm rounded-lg overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-aeon-light text-aeon-dark">
                        <tr>
                            <th class="p-3">Operator</th>
                            <th class="p-3">Nominal</th>
                            <th class="p-3">Harga Modal</th>
                            <th class="p-3">Harga Jual</th>
                            <th class="p-3">Laba</th>
                            <th class="p-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $p)
                            <tr class="border-t">
                                <td class="p-3">{{ $p->operator }}</td>
                                <td class="p-3">Rp {{ number_format($p->nominal, 0, ',', '.') }}</td>
                                <td class="p-3">Rp {{ number_format($p->harga_modal, 0, ',', '.') }}</td>
                                <td class="p-3">Rp {{ number_format($p->harga_jual, 0, ',', '.') }}</td>
                                <td class="p-3">Rp {{ number_format($p->harga_jual - $p->harga_modal, 0, ',', '.') }}</td>
                                <td class="p-3 flex gap-2">
                                    <a href="{{ route('admin.products.edit', $p) }}" class="text-aeon">Ubah</a>
                                    <form method="POST" action="{{ route('admin.products.destroy', $p) }}"
                                          onsubmit="return confirm('Hapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-6 text-center text-gray-500">Belum ada produk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>