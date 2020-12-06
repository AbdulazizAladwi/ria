<!------------------Update Form----------------------->
<div wire:ignore.self id="updateModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">@lang('site.edit_cost')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">@lang('site.name')</label>
                        <input type="text" id="exampleFormControlInput1" class="form-control"  placeholder="Enter Name" wire:model="name" />
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">@lang('site.cost')</label>
                        <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="Enter Cost" wire:model="cost" />
                        @error('cost')<span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput3">@lang('site.type')</label>
                        <select class="form-control" id="exampleFormControlInput3" wire:model="typeCreate">
                            <option value="">@lang('site.select_type')</option>
                            <option value="Indirect">@lang('site.indirect')</option>
                            <option value="Other">@lang('site.other')</option>
                        </select>
                        @error('typeCreate')<span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="modal-footer">       
                    <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('site.close')</button>
                    <button wire:click.prevent="update()" class="btn btn-secondary">@lang('site.update')</button>
                     </div>
                </form>
            </div>
        </div>
    </div>
</div>
