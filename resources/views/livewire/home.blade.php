<div class="page-wrapper">
    <div class="grid md:grid-cols-3 gap-2 md:gap-6">
        <div class="card card-compact">
            <div class="card-body flex-row items-center gap-3">
                <div class="avatar placeholder">
                    <div class="w-12 bg-warning rounded-full">
                        <x-tabler-calendar-month class="size-6"/>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="text-xs opacity-50">Pendapatan Bulan Ini</div>
                    <div class="text-2xl font-bold">Rp. {{ Number::format($monthly) }}</div>
                </div>
            </div>
        </div>
        <div class="card card-compact">
            <div class="card-body flex-row items-center gap-3">
                <div class="avatar placeholder">
                    <div class="w-12 bg-warning rounded-full">
                        <x-tabler-calendar-check class="size-6"/>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="text-xs opacity-50">Pendapatan Hari Ini</div>
                    <div class="text-2xl font-bold">Rp. {{ Number::format($daily->sum('price')) }}</div>
                </div>
            </div>
        </div>
        <div class="card card-compact">
            <div class="card-body flex-row items-center gap-3">
                <div class="avatar placeholder">
                    <div class="w-12 bg-warning rounded-full">
                        <x-tabler-list-check class="size-6"/>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="text-xs opacity-50">Total Pesanan Hari Ini</div>
                    <div class="text-2xl font-bold"> {{ $daily->count() }} Pesanan</div>
                </div>
            </div>
        </div>
    </div>
    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Customer</th>
                <th>Total Bayar</th>
                <th>Status</th>
                <th>Print</th>
            </thead>
            <tbody>
                @foreach ($pendings as $pending)
                    <tr wire:key="{{ $pending->id }}">
                        <td>{{$pending->id}}</td>
                        <td>{{$pending->created_at->diffForHumans()}}</td>
                        <td>{{$pending->description}}</td>
                        <td>{{$pending->customer?->name}}</td>
                        <td>Rp. {{ Number::format($pending->price) }},-</td>
                        <td>
                            <input type="checkbox" class="toggle toggle-sm toggle-primary" @checked($pending->done) wire:change="toggleDone({{ $pending->id }})"/>
                        </td>
                        <td>
                            <button class="btn btn-xs" onclick="return cetakStruk('{{ route('transaction.cetak', $pending) }}')">
                                <x-tabler-printer class="size-4"/> 
                                <span>Cetak</span>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
