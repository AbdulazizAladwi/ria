<div class="modal fade" wire:ignore.self tabindex="-1" id="ChangeStatus" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="card-body">
            <div class="modal-dialog mt-0 mb-0" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">@lang('site.change_status')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="col-md-12 mb-3">
                            <label for="">@lang('site.stage')</label>
                            <select wire:model="modalStageId" wire:change="getModalStatusByStage" class="form-control">
                                <option value="">@lang('site.select_stage')</option>
                                @foreach($filterStages as $index=>$stage)
                                    <option value="{{$index}}">{{$stage}}</option>
                                @endforeach
                            </select>
                        </div>



                        @if($modalStatus)
                            <div class="col-md-12">
                                <label for="">@lang('site.status')</label>
                                <select wire:model="modalStatusId" class="form-control">
                                    <option value="">@lang('site.select_status')</option>
                                    @foreach($modalStatus as $index=>$status)
                                        <option value="{{$index}}">{{$status}}</option>
                                    @endforeach
                                </select>
                                @error('modalStatusId') <span class="error text-danger">{{ $message }}</span> @enderror

                            </div>
                        @endif


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="changeStatus({{$opportunity}})">Save changes</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


