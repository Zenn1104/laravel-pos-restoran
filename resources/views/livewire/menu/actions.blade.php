<div>
    <input type="checkbox" id="my_modal_6" class="modal-toggle" @checked($show)/>
    <div class="modal" role="dialog">
    <form class="modal-box" wire:submit="simpan">
        <h3 class="font-bold text-lg">Tambah Data Menu</h3>
        <div class="py-4 space-y-2">
            <div class="flex justify-center">
                <label for="picture" class="avatar">
                    <div class="w-24 rounded-xl">
                      <img src="{{ $photo ? $photo->temporaryUrl() : url('noimages.png') }}" />
                    </div>
                </label>
            </div>
            <input type="file" id="picture" class="hidden" wire:model="photo">
            <label class="form-control">
                <div class="label">
                  <span class="label-text">Nama Menu</span>
                </div>
                <input type="text" placeholder="Type here" @class(['input input-bordered', 'input-error' => $errors->first('form.name')]) wire:model="form.name"/>
              </label>
            <label class="form-control">
                <div class="label">
                  <span class="label-text">Harga</span>
                </div>
                <input type="number" placeholder="Type here" @class(['input input-bordered', 'input-error' => $errors->first('form.price')]) wire:model="form.price"/>
              </label>
            <label class="form-control">
                <div class="label">
                  <span class="label-text">Type</span>
                </div>
                <select  @class(['select select-bordered', 'input-error' => $errors->first('form.type')]) wire:model="form.type">
                    @foreach ($types as $type)
                     <option value="{{ $type }}">{{ $type }}</option>   
                    @endforeach
                </select>
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
