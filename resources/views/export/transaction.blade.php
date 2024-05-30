<table>
    <thead>
        <tr>
            <th>Kode</th>
            <th>Tanggal</th>
            <th>Customer</th>
            <th>Total Belanja</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->created_at-format('Y-m-d') }}</td>
                <td>{{ $transaction->customer?->name }}</td>
                <td>{{ $transaction->price }}</td>
                <td>{{ $transaction->description }}</td>
            </tr>
        @endforeach
    </tbody>
</table>