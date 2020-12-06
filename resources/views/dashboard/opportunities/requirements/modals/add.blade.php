<!-- Modal -->

<div class="modal fade" wire:ignore.self id="addRequirement" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <form>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        @lang('site.add_requirement')
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="">@lang('site.name')</label>
                            <select name="" id="" wire:model.lazy="type" class="form-control">
                                <option value="">@lang('site.choose_requirement')</option>
                                @foreach($getRequirements as $index=>$requirement)
                                    <option value="{{$index}}">{{$requirement}}</option>
                                @endforeach
                            </select>
                            @error('type') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="">@lang('site.deadline')</label>
                            <input type="date" min="{{now()->toDateString()}}" class="form-control" wire:model="deadline">
                            @error('deadline') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('site.close')</button>

                    <button type="submit" wire:click.prevent="addRequirement"
                            class="btn btn-secondary">@lang('site.add')</button>
                </div>
            </div>
        </div>
    </form>
</div>
