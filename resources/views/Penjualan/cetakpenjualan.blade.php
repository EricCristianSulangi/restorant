<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .container {
            max-width: 300px;
            margin: 0 auto;
            border: 2px solid #000;
            padding: 10px;
            background-color: #fff;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: none;
            padding: 5px 0;
        }
        th {
            text-align: left;
        }
        .subtotal {
            text-align: right;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Struk Penjualan</h2>
        </div>
        <table>
            <tr>
                <th>Tanggal:</th>
                <td>{{ $penjualan->TanggalPenjualan }}</td>
            </tr>
            <tr>
                <th>Pelanggan:</th>
                <td>{{ $pelanggan->NamaPelanggan }}</td>
            </tr>
            <tr>
                <th>Kasir:</th>
                <td>{{ $penjualan->createdBy->username }}</td>
            </tr>
            <tr>
                <th>Alamat:</th>
                <td>{{ $pelanggan->Alamat }}</td>
            </tr>
            <tr>
                <th>Nomor Telepon:</th>
                <td>{{ $pelanggan->NomorTelepon }}</td>
            </tr>
        </table>
        <table>
            <tr>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th class="subtotal">Subtotal</th>
            </tr>
            @foreach ($detailPenjualan as $detail)
            <tr>
                <td>{{ $detail->produk->NamaProduk }}</td>
                <td>{{ $detail->JumblahProduk }}</td>
                <td class="subtotal">RP.{{ number_format($detail->Subtotal, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </table>
        <div class="footer">
            <p class="total">Total Harga: RP.{{ number_format($penjualan->TotalHarga) }}</p>
            <p class="bayar">Bayar : RP.{{ number_format($penjualan->Bayar) }}</p>
            <p class="kembalian">Kembalian: RP.{{ number_format($penjualan->Kembalian) }}</p>
            <p>Terima kasih telah berbelanja di toko kami!</p>
        </div>
    </div>
</body>
</html>
