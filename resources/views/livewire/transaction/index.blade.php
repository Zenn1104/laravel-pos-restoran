<div class="page-wrapper">
    <div class="flex flex-col md:flex-row justify-between gap-2">
        <input type="date" class="input input-bordered" wire:model.live="date">
        <a href="{{ route('transaction.export') }}" wire:navigate class="btn btn-primary">
            <x-tabler-upload class="size-5"/>
            <span>Exprot Transaksi</span>
        </a>
    </div>
    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Customer</th>
                <th>Total Price</th>
                <th>Status</th>
                <th class="text-center">Actions</th>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $number++ }}</td>
                        <td>{{$transaction->created_at->diffForHumans()}}</td>
                        <td>{{ $transaction->description }}</td>
                        <td>{{ $transaction->customer?->name }}</td>
                        <td>Rp. {{ Number::format($transaction->price) }},-</td>
                        <td> 
                            <input type="checkbox" class="toggle toggle-sm toggle-primary" @checked($transaction->done) wire:change="toggleDone({{ $transaction->id }})"/>
                        </td>
                        <td>
                            <div class="flex justify-center gap-1">
                                <button class="btn btn-xs btn-square" wire:click="$dispatch('detailTransaction', {transaction: {{$transaction->id}}})">
                                    <x-tabler-folder class="size-4"/>
                                </button>
                                <a href="{{ route('transaction.edit', $transaction) }}" class="btn btn-xs btn-square" wire:navigate>
                                    <x-tabler-edit class="size-4"/>
                                </a>
                                <button class="btn btn-xs btn-square" wire:click="deleteTransaction({{ $transaction->id }})">
                                    <x-tabler-trash class="size-4"/>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @livewire('transaction.detail')
</div>
