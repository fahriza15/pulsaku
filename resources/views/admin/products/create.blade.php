<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Tambah Produk Pulsa</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto px-6 bg-white p-6 shadow-sm rounded-lg">
            <form method="POST" action="{{ route('admin.products.store') }}">
                @csrf
                @include('admin.products._form')

                <div class="mt-6 flex gap-3">
                    <button type="submit" class="px-4 py-2 bg-aeon hover:bg-aeon-dark text-white rounded-md">Simpan</button>
                    <a href="{{ route('admin.products.index') }}" class="px-4 py-2 border rounded-md">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>