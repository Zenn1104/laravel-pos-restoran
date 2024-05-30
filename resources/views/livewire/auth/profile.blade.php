<div class="page-wrapper">
    <div class="card max-w-lg mx-auto">
        <form class="card-body" wire:submit="update">
            <h3 class="card-title">Update Profile</h3>

            <div class="py-4 space-y-2">
                <label class="form-control">
                    <div class="label">
                      <span class="label-text">Nama Lengkap</span>
                    </div>
                    <input type="text" placeholder="Type here" @class(['input input-bordered', 'input-error' => $errors->first('name')]) wire:model="name" />
                  </label>
            </div>
            <div class="py-4 space-y-2">
                <label class="form-control">
                    <div class="label">
                      <span class="label-text">Email</span>
                    </div>
                    <input type="email" placeholder="jhondoe@gmail.com" @class(['input input-bordered', 'input-error' => $errors->first('email')]) wire:model="email" />
                  </label>
            </div>
            <div class="py-4 space-y-2">
                <label class="form-control">
                    <div class="label">
                      <span class="label-text">Password</span>
                    </div>
                    <input type="password" placeholder="*****" @class(['input input-bordered', 'input-error' => $errors->first('password')]) wire:model="password" autocomplete="email" />
                  </label>
            </div>

            <div class="card-actions">
                <button class="btn btn-primary">
                    <x-tabler-check class="size-5"/>
                    <span>Simpan</span>
                </button>
            </div>
        </div>
    </div>
</div>