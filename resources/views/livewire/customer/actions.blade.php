<div>
    <input type="checkbox" id="my_modal_6" class="modal-toggle" @checked($show)/>
    <div class="modal" role="dialog">
    <form class="modal-box" wire:submit="simpan">
        <h3 class="font-bold text-lg">Tambah Data Customer</h3>
        <div class="py-4 space-y-2">
            <label class="form-control">
                <div class="label">
                  <span class="label-text">Nama Customer</span>
                </div>
                <input type="text" placeholder="Type here" @class(['input input-bordered', 'input-error' => $errors->first('form.name')]) wire:model="form.name"/>
              </label>
            <label class="form-control">
                <div class="label">
                  <span class="label-text">Contact</span>
                </div>
                <input type="text" placeholder="Type here" @class(['input input-bordered', 'input-error' => $errors->first('form.contact')]) wire:model="form.contact"/>
              </label>
            <label class="form-control">
                <div class="label">
                  <span class="label-text">Keterangan</span>
                </div>
                <textarea type="text" placeholder="tulis keterangan menu disini..." @class(['textarea textarea-bordered', 'input-error' => $errors->first('form.description')]) wire:model="form.description"></textarea>
              </label>
        </div>
        <div class="modal-action justify-between">
        <button type="button" class="btn btn-ghost" wire:click="closeMenuModal">Close!</button>
        <button class="btn btn-primary">
            <x-tabler-check class="size-5"/>
            <span>Simpan</span>
        </button>
        </div>
    </div>
</form>
</div>
