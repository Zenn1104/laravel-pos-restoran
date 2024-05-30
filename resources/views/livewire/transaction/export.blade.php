<div class="page-wrapper">
    <div class="card card-devider max-w-4xl mx-auto">
        <div class="card-body space-y-4">
            <h3 class="text-xl font-bold">Export data Transaksi</h3>
            <p>Untuk Mengekspor data transaksi atau mendapatkan rekap data transaksi dalam bentuk excel, Silahkan pilih
                bulan terlebih dalu kemudian klik "export data".</p>
        </div>
        <div class="card-body py-4">
            <form class="card-actions" wire:submit="export">
                <input type="month" @class(['input input-bordered', 'input-error' => $errors->first('month')]) wire:model="month">
                <button class="btn btn-primary">
                    <x-tabler-upload class="size-5"/>
                    <span>Export data</span>
                </button>
            </fo>
        </div>
    </div>
</div>
