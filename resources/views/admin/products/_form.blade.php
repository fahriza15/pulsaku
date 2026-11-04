<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium">Operator</label>
        <input type="text" name="operator"
               value="{{ old('operator', $product->operator ?? '') }}"
               placeholder="Contoh: Telkomsel"
               class="mt-1 w-full border-gray-300 rounded-md shadow-sm">
        @error('operator') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Nominal (Rp)</label>
        <input type="number" name="nominal"
               value="{{ old('nominal', $product->nominal ?? '') }}"
               placeholder="10000"
               class="mt-1 w-full border-gray-300 rounded-md shadow-sm">
        @error('nominal') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Harga Modal (Rp)</label>
        <input type="number" name="harga_modal"
               value="{{ old('harga_modal', $product->harga_modal ?? '') }}"
               placeholder="9600"
               class="mt-1 w-full border-gray-300 rounded-md shadow-sm">
        @error('harga_modal') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Harga Jual (Rp)</label>
        <input type="number" name="harga_jual"
               value="{{ old('harga_jual', $product->harga_jual ?? '') }}"
               placeholder="10500"
               class="mt-1 w-full border-gray-300 rounded-md shadow-sm">
        @error('harga_jual') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>
</div>