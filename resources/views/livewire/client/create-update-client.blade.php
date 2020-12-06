<div>
    <div class="col-md-10 mx-auto">
        <div class="card">
            @if($update)
                <div class="card-header">@lang('site.edit_client')</div>
            @else
                <div class="card-header">@lang('site.add_new_client')</div>
            @endif

            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="" class="required">@lang('site.name')</label>
                        <input type="text" wire:model.lazy="fields.name" placeholder="@lang('site.name')" class="form-control required">
                        @error('fields.name')
                            <p style="color: #ae1c17">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="" class="required">@lang('site.choose_type')</label>
                        <select class="form-control" wire:model.lazy="fields.type_id">
                            <option value="">@lang('site.choose_type')</option>
                            @foreach( $clientTypes as $index => $value)
                                <option value="{{ $index }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        @error('fields.type_id')
                        <p style="color: #ae1c17">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="">@lang('site.phone1')</label>

                        <input type="text" wire:model.lazy="fields.phone1" placeholder="@lang('site.phone1')" class="form-control">
                        @error('fields.phone1')
                        <p style="color: #ae1c17">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="">@lang('site.phone2')</label>
                        <input type="number" wire:model.lazy="fields.phone2" placeholder="@lang('site.phone2')" class="form-control">
                        @error('fields.phone2')
                        <p style="color: #ae1c17">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="">@lang('site.phone_extension')</label>
                        <input type="number" name="phone_extension" wire:model.lazy="fields.phone_extension" placeholder="@lang('site.phone_extension')" class="form-control">
                        @error('fields.phone_extension')
                        <p style="color: #ae1c17">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="">@lang('site.email1')</label>
                        <input type="email" name="email1"  wire:model.lazy="fields.email1" placeholder="@lang('site.email1')" class="form-control">
                        @error('fields.email1')
                        <p style="color: #ae1c17">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="">@lang('site.email2')</label>
                        <input type="email"  name="email2" wire:model.lazy="fields.email2" placeholder="@lang('site.email2')" class="form-control">
                        @error('fields.email2')
                        <p style="color: #ae1c17">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="">@lang('site.website')</label>
                        <input type="url"  name="website" wire:model.lazy="fields.website" placeholder="@lang('site.website')" class="form-control">
                        @error('fields.website')
                        <p style="color: #ae1c17">{{ $message }}</p>
                        @enderror
                    </div>
                </div>


                <div class="row mb-1">
                    <div class="col-md-12 h6 mb-0 mt-3">@lang('site.address') </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3 mb-3">
                        <label for="">@lang('site.area')</label>
                        <input type="text" name="area" wire:model.lazy="fields.area" placeholder="@lang('site.area')" class="form-control">
                        @error('fields.area')
                        <p style="color: #ae1c17">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="">@lang('site.block')</label>
                        <input type="number" name="block"  wire:model.lazy="fields.block" placeholder="@lang('site.block')" class="form-control">
                        @error('fields.block')
                        <p style="color: #ae1c17">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="">@lang('site.street')</label>
                        <input type="text" wire:model.lazy="fields.street" placeholder="@lang('site.street')" class="form-control">
                        @error('fields.street')
                        <p style="color: #ae1c17">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="">@lang('site.zip_code')</label>
                        <input type="number"  name="zip_code"  wire:model.lazy="fields.zip_code" placeholder="@lang('site.zip_code')" class="form-control">
                        @error('fields.zip_code')
                        <p style="color: #ae1c17">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-1">
                    <div class="h6 mb-0 mt-3 col-md-12">@lang('site.social_media_accounts')</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="">@lang('site.instagram')</label>
                        <input type="url" wire:model.lazy="fields.instagram" placeholder="@lang('site.instagram')" class="form-control">
                        @error('fields.instagram')
                        <p style="color: #ae1c17">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="">@lang('site.facebook')</label>
                        <input type="url" wire:model.lazy="fields.facebook" placeholder="@lang('site.facebook')" class="form-control">
                        @error('fields.facebook')
                        <p style="color: #ae1c17">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="">@lang('site.twitter')</label>
                        <input type="url" wire:model.lazy="fields.twitter" placeholder="@lang('site.twitter')" class="form-control">
                        @error('fields.twitter')
                        <p style="color: #ae1c17">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="">@lang('site.snapchat')</label>
                        <input type="url" wire:model.lazy="fields.snapchat" placeholder="@lang('site.snapchat')" class="form-control">
                        @error('fields.snapchat')
                        <p style="color: #ae1c17">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                    <div class="wrapper mb-3 mt-5 dotted-wrap" style="">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <span class="h6">@lang('site.sister_companies')</span>
                                <button wire:click.prevent="add" class="btn btn-thirdly btn-sm mx-2">
                                    <i class="icon-plus2 AddCompany"></i>
                                </button>
                            </div>
                        </div>

                        @foreach( $sisterCompanies as $index => $value )

                            <div class="m-3">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="">@lang('site.company_name')</label>
                                        <input type="text" wire:model.lazy="sisterCompanies.{{ $index }}.name"    placeholder="@lang('site.company_name')" class="form-control">
                                        @error("sisterCompanies.".$index.".name")
                                        <p style="color: #ae1c17">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="">@lang('site.company_phone1')</label>
                                        <input type="text" wire:model.lazy="sisterCompanies.{{ $index }}.phone1"  placeholder="@lang('site.company_phone1')" class="form-control">
                                        @error("sisterCompanies.".$index.".phone1")
                                        <p style="color: #ae1c17">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">@lang('site.company_phone2')</label>
                                        <input type="number" wire:model.lazy="sisterCompanies.{{ $index }}.phone2"  placeholder="@lang('site.company_phone2')" class="form-control">
                                        @error("sisterCompanies.".$index.".phone2")
                                        <p style="color: #ae1c17">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col-md-6">

                                        @if ( $update )
                                            <input disabled type="hidden" wire:model="sisterCompanies.{{ $index }}.id">
                                        @endif

                                        <label for="">@lang('site.company_email1')</label>
                                        <input type="email" wire:model.lazy="sisterCompanies.{{ $index }}.email1"  placeholder="@lang('site.company_email1')" class="form-control">
                                        @error("sisterCompanies.".$index.".email1")
                                        <p style="color: #ae1c17">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">@lang('site.company_email2')</label>
                                        <input type="email" wire:model.lazy="sisterCompanies.{{ $index }}.email2"   placeholder="@lang('site.company_email2')" class="form-control">
                                        @error("sisterCompanies.".$index.".email2")
                                        <p style="color: #ae1c17">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>

                                <button  wire:click.prevent="remove({{ $index }})" class="btn btn-danger btn-sm" wire:loading.attr="disabled">
                                    @lang('site.remove')
                                </button>
                            </div>
                        @endforeach

                    </div>

                <!--submit button-->

                <div style="text-align: right">
                    <button wire:click.prevent="addUpdateClient" class="btn btn-secondary">
                        {{ $update ? trans('site.update') : trans('site.add') }}
                    </button>
                </div>

                <!--end of card body-->
            </div>

        </div>
    </div>

</div>
</div>



@push('js')

    <script>
        Livewire.on('clientAdded', param => {
            toastr[param['type']](param['message']);
            window.location.href = '/clients'
        });

        Livewire.on('clientUpdated', param => {
            toastr[param['type']](param['message']);
            window.location.href = '/clients'
        });
    </script>

@endpush
