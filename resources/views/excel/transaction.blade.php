<table>
    <thead>
        <tr>
            <th>NO</th>
            <th>Tanggal Penjualan</th>
            <th>Nama Pelanggan</th>
            <th>Username</th>
            <th>Alamat</th>
            <th>Nomor Telepon</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($penjualans as $penjualan)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>{{ $penjualan->TanggalPenjualan }}</td>
                <td>{{ $pelanggan->find($penjualan->PelangganID)->NamaPelanggan }}</td>
                <td>{{ $penjualan->createdBy->username }}</td>
                <td>{{ $pelanggan->find($penjualan->PelangganID)->Alamat }}</td>
                <td>{{ $pelanggan->find($penjualan->PelangganID)->NomorTelepon }}</td>
                <td>{{ $penjualan->TotalHarga }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
