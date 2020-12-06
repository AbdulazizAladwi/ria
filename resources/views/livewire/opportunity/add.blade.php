<div>
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header">@lang('site.add_new_opportunity')</div>
            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="required" for="">@lang('site.name')</label>
                        <input type="name" wire:model.lazy="name"  wire:change="showFile" class="form-control" placeholder="@lang('site.name')">
                        @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="required" for="">@lang('site.client')</label>
                        <select name="clients" wire:model.lazy="getClient" wire:change="getClientContacts"  class="form-control">
                            <option value="">@lang('site.choose_client')</option>
                                @foreach($clients as $index=>$client)
                                    <option value="{{$client->id}}">{{$client->name}}</option>
                                @endforeach
                        </select>
                        @error('getClient') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>


                <div class="row mb-3">

                    @if($contacts)

                        <div class="col-md-6">
                            <label for="">@lang('site.contacts')</label>
                            <select name="" wire:model="getContact"  class="form-control d-inline-block">
                                <option value="">@lang('site.select_contact')</option>
                                    @foreach($contacts as $contact)
                                        <option value="{{$contact['id']}}">{{$contact['name']}}</option>
                                    @endforeach
                            </select>
                            @error('getContact') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                    @endif

                    <div class="col-md-6">
                        <label for="">@lang('site.stage')</label>
                        <select disabled class="form-control d-inline-block">
                            <option>@lang('site.prospect')</option>
                        </select>
                    </div>

                </div>


                @for($i=1; $i<=$count; $i++)
                    <div class="row mb-6 wrapper{{$i}}" >
                        <div class="col-md-4">
                            <label for="">@lang('site.actions')</label>
                            <textarea wire:model.lazy="action.{{$i}}" cols="30" rows="10" class="form-control"></textarea>
                            @error('action') <span class="error text-danger mt-3">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-4 mt-2">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="">@lang('site.data_and_time')</label>
                                    <input type="datetime-local" wire:model.lazy="date.{{$i}}" class="form-control">
                                    @error('date') <span class="error text-danger mt-3">{{ $message }}</span> @enderror
                                </div>

                                @if($showFile)
                                    <div class="col-md-12">
                                        <label for="">@lang('site.attach_file')</label>
                                        <input type="file" wire:model="file.{{$i}}" class="form-control-file">
                                        @error('file.' .$i) <span class="error text-danger mt-3">{{ $message }}</span> @enderror

                                    </div>
                                @endif
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="">@lang('site.duration')</label>
                                    <input type="number" class="form-control" wire:model="duration.{{$i}}">
                                    @error('duration.' . $i) <span class="error text-danger mt-3">{{ $message }}</span> @enderror

                                </div>

                            </div>


                        </div>





                        <div class="col-md-2 mx-auto mt-5">
                            @if($i==1)
                                <i class="icon-plus" wire:click="incrementCount"></i>
                            @else
                                <i class="icon-minus minus" data-id="{{$i}}" wire:click="decrementCount({{$i}})"></i>
                            @endif
                        </div>




                    </div>

                    <hr>
                @endfor

                <!--submit button-->
                <div style="text-align: right">
                    <button name="store" wire:click="StoreOpportunity" class="btn btn-secondary">Submit</button>
                </div>

            </div>

        </div>
    </div>

</div>
</div>

@push('js')
    <script>
        Livewire.on('Opportunity_added', ()=>{
            toastr.success('{!!  trans("site.added_successfully") !!}');
        })
    </script>

    <script>
        $(document).on('click', '.minus', function () {
            var id = $(this).data('id');
            $('.wrapper'+id).remove();
        })
    </script>

@endpush
