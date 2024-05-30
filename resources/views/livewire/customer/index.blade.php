<div class="page-wrapper">
    <div class="flex flex-col md:flex-row justify-between gap-2">
        <input type="search" class="input input-bordered" placeholder="Cari Customer..." wire:model.lazy="search">
        <button class="btn btn-primary" wire:click="$dispatch('createCustomer')">
            <x-tabler-plus class="size-5"/>
            <span>Tambah Customer</span>
        </button>
    </div>
    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Customer</th>
                <th>Harga</th>
                <th>Keterangan</th>
                <th class="text-center">Actions</th>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $number++ }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->contact }}</td>
                        <td>{{ Str::limit($customer->description) }}</td>
                        <td>
                            <div class="flex justify-center gap-1">
                                <button class="btn btn-xs btn-square" wire:click="$dispatch('editCutomer', {customer: {{ $customer->id }}})">
                                    <x-tabler-edit class="size-4"/>
                                </button>
                                <button class="btn btn-xs btn-square" wire:click="$dispatch('deleteCutomer', {customer: {{ $customer->id }}})">
                                    <x-tabler-trash class="size-4"/>
                                </button>
                            </div>
                        </td>
                    </tr>    
                @endforeach
            </tbody>
        </table>
    </div>
    @livewire('customer.actions')
</div>
