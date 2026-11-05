<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Invoice {{ $order->kode }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 13px; color: #222; }
        .header { border-bottom: 2px solid #222; padding-bottom: 10px; margin-bottom: 20px; }
        .brand { font-size: 22px; font-weight: bold; }
        .muted { color: #666; }
        table { width: 100%; border-collapse: collapse; }
        .info td { padding: 3px 0; }
        .items th { background: #eee; text-align: left; padding: 8px; border: 1px solid #ccc; }
        .items td { padding: 8px; border: 1px solid #ccc; }
        .right { text-align: right; }
        .total td { font-weight: bold; font-size: 15px; }
        .lunas { display: inline-block; margin-top: 20px; padding: 6px 14px;
                 border: 2px solid #1a7f37; color: #1a7f37; font-weight: bold; }
        .footer { margin-top: 40px; font-size: 11px; color: #666; text-align: center; }
    </style>
</head>
<body>
    <div class="header">
        <div class="brand">PulsaKu</div>
        <div class="muted">Invoice Pembelian Pulsa</div>
    </div>

    <table class="info">
        <tr><td width="140">No. Invoice</td><td>: {{ $order->kode }}</td></tr>
        <tr><td>Tanggal Bayar</td><td>: {{ $order->paid_at?->format('d/m/Y H:i') }}</td></tr>
        <tr><td>Pelanggan</td><td>: {{ $order->user->name }}</td></tr>
        <tr><td>Metode Bayar</td><td>: {{ $order->metode_bayar }}</td></tr>
    </table>

    <br>

    <table class="items">
        <thead>
            <tr>
                <th>Deskripsi</th>
                <th>Nomor HP</th>
                <th class="right">Harga</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Pulsa {{ $order->operator }} Rp {{ number_format($order->nominal, 0, ',', '.') }}</td>
                <td>{{ $order->nomor_hp }}</td>
                <td class="right">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
            </tr>
            <tr class="total">
                <td colspan="2" class="right">Total</td>
                <td class="right">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="lunas">LUNAS</div>

    <div class="footer">
        Dokumen ini dibuat otomatis oleh sistem dan merupakan bukti pembayaran yang sah (simulasi).
    </div>
</body>
</html>