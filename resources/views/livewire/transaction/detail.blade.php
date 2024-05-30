<div>
    <input type="checkbox"  class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
    <div class="modal-box">
        <h3 class="font-bold text-lg">Detail Transaksi</h3>
        <div class="py-4 space-y-4">
            <div class="flex flex-col">
                <div class="text-sm opacity-50">Tanggal Transaksi</div>
                <div>{{$transaction?->created_at->format('d F Y H:i')}}</div>
            </div>
            <div class="flex flex-col">
                <div class="text-sm opacity-50">Nama Customer</div>
                <div>{{$transaction?->customer?->name ?? '-'}}</div>
            </div>
            <div class="flex flex-col">
                <div class="text-sm opacity-50">Total Bayar</div>
                <div>{{ Number::format($transaction?->price ?? 0) }}</div>
            </div>

            <div class="table-wrapper">
                <table class="table">
                    <thead>
                        <th>Nama Menu</th>
                        <th>Qty</th>
                        <th>Harga</th>
                    </thead>
                    <tbody>
                        @foreach ($transaction->items ?? [] as $key => $item)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $item['qty'] }}</td>
                                <td>{{ Number::format($item['price']) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-action justify-between">
        <button type="button" class="btn btn-ghost" wire:click="closeModal">Close!</button>
        @isset($transaction)
        <a href="{{ route('transaction.cetak', $transaction) }}" onclick="return cetakStruk('{{ route('transaction.cetak', $transaction) }}')" class="btn btn-primary">
            <x-tabler-printer class="size-5"/>
            <span>Cetak Struk</span>
        </a>
        @endisset
        </div>
    </div>
    </div>
</div>
