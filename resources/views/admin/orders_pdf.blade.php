<!DOCTYPE html>
<html>
<head>
    <title>Orders Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Orders Report</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Customer</th>
                <th>Nama Camera</th>
                <th>Total Bayar</th>
                <th>Durasi</th>
                <th>Denda</th>
                <th>Order Date</th>
                <th>end Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->barang->kode_barang }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->barang->nama_barang }}</td>
                    @if($order->payment_id != null)
                    <td>Rp. {{ number_format($order->payment->total, 0, ',', '.') }}</td>
                    @else
                    <td>Rp. {{ number_format($order->harga, 0, ',', '.') }}</td>
                    @endif

                    <td>{{ $order->durasi }} Jam</td>
                    <td>Rp. {{ number_format($order->denda, 0, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($order->starts)->format('d/m/Y H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($order->ends)->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
